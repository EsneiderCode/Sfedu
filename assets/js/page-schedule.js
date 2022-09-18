var global_group = undefined;
var base_url =
  "https://cors-everywhere.herokuapp.com/http://165.22.28.187/schedule-api";
var base_url_download = "http://165.22.28.187/schedule-api/";
var global_week = null;
let existingName = "";
let actualWeek = "";
let inputValue = "";
if (
  localStorage.getItem("storage") != undefined &&
  localStorage.getItem("storage") != ""
) {
  existingName = JSON.parse(localStorage.getItem("storage")).name;
  actualWeek = JSON.parse(localStorage.getItem("storage")).week;
  search(existingName);
}

function imprSelec(name) {
    window.print();
    return false;
}

document.getElementById("search-button").onclick = function () {
  var query = document.getElementById("search-field").value;
  search(query);
};
document.getElementById("search-field").onkeyup = function (event) {
  if (event.key === 13 || event.keyCode === 13) {
    event.preventDefault();
    document.getElementById("search-button").click();
  }
};
document.getElementById("list-block").onclick = function (event) {
  event.preventDefault();
  if (event.target.tagName === "A") {
    var a = event.target;
    var group = a.getAttribute("doc_group");
    global_group = group;
    getFromGroup(group);
  }
};
document.getElementById("week-block").onclick = function (event) {
  event.preventDefault();
  if (event.target.tagName === "DIV") {
    var a = event.target;
    var week = a.getAttribute("week");
    getFromGroupWeek(global_group, week);
  }
};
function search(query) {
  inputValue = query;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      processResult(this.responseText);
    }
  };
  xhttp.open("GET", base_url + "/?query=" + query, true);
  xhttp.send();
}
function processResult(response) {
  const resJson = JSON.parse(response);
  let newQuery = inputValue.split(" ");
  newQuery = newQuery[0];
  if (resJson.result == "no_entries" && newQuery == inputValue){
    document.getElementById("list-block").innerHTML = "";
    document.getElementById("header-block").innerHTML = "<h5 id='not-found'>По данному запросу расписание не найдено</h5>";
    document.getElementById("week-block").innerHTML = "";
    document.getElementById("calendar-link").innerHTML = "";
    document.getElementById("table-block").innerHTML = "";
    document.querySelector(".schedule-mobile").innerHTML = "";
  }else if (resJson.result == "no_entries" && newQuery != inputValue){
    search(newQuery);
  }else {
    response = JSON.parse(response);
    if (response.choices) {
      parseListFromResponse(response);
      document.getElementById("table-block").innerHTML = "";
      document.getElementById("header-block").innerHTML = "";
      document.getElementById("week-block").innerHTML = "";
      document.getElementById("calendar-link").innerHTML = "";
    } else if (response.table) {
      document.getElementById("header-block").innerHTML = "";
      parseTableFromResponse(response);
      setCalendarLink(response);
      parseHeaderFromResponse(response);
      parseWeekFromResponse(response);
      document.getElementById("list-block").innerHTML = "";
    }
  }

}
function parseListFromResponse(response) {
    var html = '<div class="collection">';
  var end = "</div>";
  const key = "name"; // ключ, по которому будем сортировать
  const sorted = response.choices.sort((resp1, resp2) =>
    resp1[key] > resp2[key] ? 1 : -1
  );
  
  for (var i in response.choices) {

    const nameSmall = response.choices[i].name.toLowerCase();
    const inputValueSmall = inputValue.toLowerCase();
    const index = nameSmall.indexOf(inputValueSmall);
    const inputLength = inputValueSmall.length + 1;
    const remainingSymbols = index + inputLength - 1;
    const inputSubs = response.choices[i].name.substring(index, remainingSymbols);

    function spliceSlice(str, index, count, add) {
      if (index < 0) {
        index = str.length + index;
        if (index < 0) {
          index = 0;
        }
      }
      let value = (add || "");
      return  value;
    }

    const newValue = spliceSlice(response.choices[i].name, index, inputLength, `<strong id="match-value">${inputSubs}</strong>`);
    response.choices[i].name = response.choices[i].name.replace(inputSubs,newValue);

    var template =
      '<a href="#!" class="collection-item" doc_group="' +
      response.choices[i].group +
      '">' +
      response.choices[i].name +
      "</a>";
    html += template;
  }
  html += end;
  document.getElementById("list-block").innerHTML = html;
}

function getWeekDay(date) {
  date = date || new Date();
  var days = ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"];
  var day = date.getDay();

  return days[day];
}

function checkActualHour(table) {
  var date = new Date();
  var currentWeekDay = getWeekDay(date);
  var currentTime = date.toLocaleTimeString("en-US", {
    hour12: false,
  });

  var startFirst = "08:00:00 AM";
  var endFirst = "09:35:59 AM";

  var startSecond = "09:36:00 AM";
  var endSecond = "11:25:59 AM";

  var startThird = "11:26:00 AM";
  var endThird = "13:30:59 PM";

  var startFourth = "13:31:00 PM";
  var endFourth = "15:20:59 PM";

  var startFifth = "15:21:00 PM";
  var endFifth = "17:25:59 PM";

  var startSixth = "17:26:00 PM";
  var endSixth = "19:15:59 PM";

  var startSeventh = "19:16:00 PM";
  var endSeventh = "21:05:59 PM";

  for (var i in table) {
    if (table[i][0].includes(currentWeekDay)) {
      if (currentTime >= startFirst && currentTime <= endFirst) {
        table[i][1] += "<span class='current-class'></span>";
      }
      if (currentTime >= startSecond && currentTime <= endSecond) {
        table[i][2] += "<span class='current-class'></span>";
      }
      if (currentTime >= startThird && currentTime <= endThird) {
        table[i][3] += "<span class='current-class'></span>";
      }
      if (currentTime >= startFourth && currentTime <= endFourth) {
        table[i][4] += "<span class='current-class'></span>";
      }
      if (currentTime >= startFifth && currentTime <= endFifth) {
        table[i][5] += "<span class='current-class'></span>";
      }
      if (currentTime >= startSixth && currentTime <= endSixth) {
        table[i][6] += "<span class='current-class'></span>";
      }
      if (currentTime >= startSeventh && currentTime <= endSeventh) {
        table[i][7] += "<span class='current-class'></span>";
      }
    }
  }
  return table;
}

function parseTableFromResponse(response) {
  localStorage.setItem(
    "storage",
    JSON.stringify({ name: response.table.name, week: response.table.week })
  );
  var table = response.table.table;
  if (!table.length) {
    noTableRender(response);
    return;
  }
  var html = '<table class="striped"><thead>';
  var separator = "</thead><tbody>";
  var end = "</tbody></table>";
  var counter = 0;
  table.shift();
  if (actualWeek === response.table.week || actualWeek === "") {
        console.log(actualWeek, response.table.week)
    table = checkActualHour(table);
  }

  for (var i in table) {
    var row = "<tr>";
    var rowEnd = "</tr>";
    table[1][0] = table[1][0].replace(",", ", ");
    table[1][0] = table[1][0].replace("Пнд", "Пн");
    table[2][0] = table[2][0].replace(",", ", ");
    table[2][0] = table[2][0].replace("Втр", "Вт");
    table[3][0] = table[3][0].replace(",", ", ");
    table[3][0] = table[3][0].replace("Срд", "Ср");
    table[4][0] = table[4][0].replace(",", ", ");
    table[4][0] = table[4][0].replace("Чтв", "Чт");
    table[5][0] = table[5][0].replace(",", ", ");
    table[5][0] = table[5][0].replace("Птн", "Пт");
    table[6][0] = table[6][0].replace(",", ", ");
    table[6][0] = table[6][0].replace("Сбт", "Сб");
    if (table.length === 8 && table[7][0].toLowerCase().includes("вск")) {
      table.pop();
    }

    for (var j in table[i]) {
      let template = "<td>";
      if (table[i][j].includes("current-class")) {
        template = "<td class='container-current-class'>";
      }
      let stringSmall = table[i][j].toLowerCase();
      if (
        stringSmall.includes("lms") ||
        stringSmall.includes("teams") ||
        stringSmall.includes("zoom") ||
        stringSmall.includes("online") ||
        stringSmall.includes("onl")
      ) {
        template +=
          '<span class="lecture-color"></span>' + table[i][j] + "</td>";
      } else if (stringSmall.includes("впк")) {
        template += '<span class="vpk-color"></span>' + table[i][j] + "</td>";
      } else if (
        table[i][j] != "" &&
        i != 0 &&
        j != 0 &&
        table[i][j] != "<span class='current-class'></span>"
      ) {
        template +=
          '<span class="practice-color"></span>' + table[i][j] + "</td>";
      } else {
        template += table[i][j] + "</td>";
      }
      row += template;
    }
    row += rowEnd;
    counter += 1;
    if (counter === 1) {
      row += separator;
    }
    html += row;
  }
  html += end;
  document.getElementById("table-block").innerHTML = html;
  global_week = response.table.week;
  global_group = response.table.group;
  let tableMobile = Object.values(table);
  tableMobile.shift();
  let newDay = "";
  for (let i = 0; i < tableMobile.length; i++) {
    if (
      (tableMobile[i][1] != "" &&
        tableMobile[i][1] != "<span class='current-class'></span>") ||
      (tableMobile[i][2] != "" &&
        tableMobile[i][2] != "<span class='current-class'></span>") ||
      (tableMobile[i][3] != "" &&
        tableMobile[i][3] != "<span class='current-class'></span>") ||
      (tableMobile[i][4] != "" &&
        tableMobile[i][4] != "<span class='current-class'></span>") ||
      (tableMobile[i][5] != "" &&
        tableMobile[i][5] != "<span class='current-class'></span>") ||
      (tableMobile[i][6] != "" &&
        tableMobile[i][6] != "<span class='current-class'></span>")
    ) {
      newDay += `  <div class="day-class-mobile">
        <p class="dayofweek-class-mobile">${tableMobile[i][0]}</p>`;
    }
    for (let j = 1; j < tableMobile[i].length; j++) {
      let stringSmall = tableMobile[i][j].toLowerCase();

      if (
        stringSmall != "" &&
        stringSmall != "<span class='current-class'></span>"
      ) {
        //If is the current class for mobile layout :
        if (tableMobile[i][j].includes("current-class")) {
          newDay += "<div class='info-class-mobile current-class-mobile'>";
          if (
            stringSmall.includes("lms") ||
            stringSmall.includes("teams") ||
            stringSmall.includes("zoom") ||
            stringSmall.includes("online") ||
            stringSmall.includes("onl")
          ) {
            newDay += `<p class="time-class-container-mobile current-class-mobile-p">${table[0][j]}</p>
                                      <p class="info-class-mobile current-class-mobile-p">${tableMobile[i][j]}<span class="lecture-color"></span></p>
                                    </div>
                                  </div>`;
          } else if (stringSmall.includes("впк")) {
            newDay += ` <p class="time-class-container-mobile current-class-mobile-p">${table[0][j]}</p>
                                                  <p class="info-class-mobile current-class-mobile-p">${tableMobile[i][j]}<span class="vpk-color"></span></p>
                                                </div>
                                              </div>`;
          } else {
            newDay += ` <p class="time-class-container-mobile current-class-mobile-p">${table[0][j]}</p>
                                        <p class="info-class-mobile current-class-mobile-p">${tableMobile[i][j]}<span class="practice-color"></span></p>
                                      </div>
                                    </div>`;
          }
          //If isn't the current class for mobile layout :
        } else {
          newDay += ' <div class="info-class-mobile">';
          if (
            stringSmall.includes("lms") ||
            stringSmall.includes("teams") ||
            stringSmall.includes("zoom") ||
            stringSmall.includes("online") ||
            stringSmall.includes("onl")
          ) {
            newDay += `<p class="time-class-container-mobile">${table[0][j]}</p>
                       <p class="info-class-mobile">${tableMobile[i][j]}<span class="lecture-color"></span></p>
                      </div>
                    </div>`;
          } else if (stringSmall.includes("впк")) {
            newDay += ` <p class="time-class-container-mobile">${table[0][j]}</p>
                        <p class="info-class-mobile">${tableMobile[i][j]}<span class="vpk-color"></span></p>
                      </div>
                    </div>`;
          } else {
            newDay += `<p class="time-class-container-mobile">${table[0][j]}</p>
                       <p class="info-class-mobile">${tableMobile[i][j]}<span class="practice-color"></span></p>
                      </div>
                    </div>`;
          }
        }
      }
    }
  }
  let templateMobile =
    `<section class="schedule-class-mobile">` + newDay + `</section>`;
  let templateMobileWithOutClasses = `<section class="schedule-class-mobile-empty">
    <h3>На этой неделе занятий еще нет</h3></section>`;
  document.querySelector(".schedule-mobile").innerHTML = templateMobile;
  if (document.querySelector(".schedule-class-mobile").innerHTML == "") {
    document.querySelector(".schedule-mobile").innerHTML =
      templateMobileWithOutClasses;
  }
}
function setCalendarLink(response) {
  var group = response.table.link;
  var html =
    '<a download href="' +
    base_url_download +
    "calendar/" +
    group +
    '" >Скачать календарь</a>';
  document.getElementById("calendar-link").innerHTML = html;
}
function noTableRender(response) {
  global_week = response.table.week;
  global_group = response.table.group;
  document.getElementById("table-block").innerHTML =
    "<p>Нет расписания на эту неделю</p>";
}
function markWeek() {
  var week = global_week;
  var el = document.getElementById("week-block");
  if (!el) {
    return;
  }
  var weekBlock = el.getElementsByTagName("A");
  for (var i = 0; i < weekBlock.length; i++) {
    if (parseInt(weekBlock[i].firstChild.textContent) === parseInt(week)) {
      weekBlock[i].firstChild.style.setProperty("color", "#3F51B5");
      weekBlock[i].firstChild.style.setProperty("text-decoration", "none");
      weekBlock[i].firstChild.style.setProperty("font-size", "20px");
      weekBlock[i].firstChild.style.setProperty("font-weight", "bold");
    } else {
      weekBlock[i].firstChild.style.setProperty("color", "#808080");
    }
  }
}

function parseHeaderFromResponse(response) {
  document.getElementById("header-block").innerHTML =
    "<h3>" +
    response.table.type +
    "   " +
    response.table.name +
    '&nbsp;' +'<span class="print">  - Неделя  ' +
    response.table.week +
    "</span>" +
    "</h3>" +
    `<section class="view-schedule-container">
                            <a href="https://ictis.sfedu.ru/help-calendar" class="option-view-schedule" id="cal-sinc-link">Инструкция по синхронизации с календарем</a> <img class="info-img" src="https://ictis.sfedu.ru/wp-content/themes/my_theme/assets/images/schedule/ic_info.png" alt="info">
                            <a class="option-view-schedule" href="javascript:imprSelec('print-calendar')" >Вывод на печать</a>
                            </section> `;
}
function parseWeekFromResponse(response) {
  var weeks = '<span class="title-week">Недели</span>';
  for (var i in response.weeks) {
    weeks +=
      '<a href="#!"><div class="chip" week="' +
      response.weeks[i] +
      '">' +
      response.weeks[i] +
      "</div></a>";
  }
  document.getElementById("week-block").innerHTML = weeks;
}
function getFromGroup(group) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      processResult(this.responseText);
    }
  };
  xhttp.open("GET", base_url + "/?group=" + group, true);
  xhttp.send();
}
function getFromGroupWeek(group, week) {
  if (week === null) {
    return;
  }
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      processResult(this.responseText);
    }
  };
  xhttp.open("GET", base_url + "/?group=" + group + "&week=" + week, true);
  xhttp.send();
}
var target = document.querySelector("#table-block");
var week_observer = new MutationObserver(function (mutations) {
  mutations.forEach(function (mutation) {
    markWeek();
  });
});
var config = { attributes: true, childList: true, characterData: true };
week_observer.observe(target, config);
const placeHolderSearchForm = document.querySelector("#search-field");
if (window.innerWidth <= 600) {
  placeHolderSearchForm.placeholder = "Введите номер группы...";
}
