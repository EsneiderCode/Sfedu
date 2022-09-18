
// Cleaning calendar events
const engDays = document.querySelectorAll('.mc_tb');
engDays.forEach((engDay)=>{
  engDay.innerHTML="";
})

if (document.querySelectorAll("strong") != null) {
  const ulUpcomingEvents = document.querySelectorAll("strong");
  ulUpcomingEvents.forEach(strong=>{
    const li = strong.children;
    for (let i = 0; i < li.length; i++){
      if (li[i].innerHTML == "–"){
        li[i].innerHTML = "";
      }
    }
   }
  )  

  const futureEvents = document.querySelectorAll(".future-event");
  futureEvents.forEach(element => {
    if (element.children[0].nextSibling.nodeValue == " – "){
      element.removeChild(element.children[0].nextSibling);
    }})

    const pastEvents = document.querySelectorAll(".past-event");
    pastEvents.forEach(element => {
    if (element.children[0].nextSibling.nodeValue == " – "){
      element.removeChild(element.children[0].nextSibling);
    }
  })

  const upcomingEvent = document.querySelectorAll(".upcoming-event");
  upcomingEvent.forEach(element => {
  if (element.children[0].nextSibling.nodeValue == " – "){
    element.removeChild(element.children[0].nextSibling);
  }
})
}

const resourcesStudent = document.querySelector('.info-student-right-p');
resourcesStudent.addEventListener('click', ()=>{
    const containerResources = document.querySelector('.resources-student');
    const containerTop = document.querySelector('.scolarship-section-student');
    const arrowResources = document.querySelector('.arrow-resources');
    let displayContainer = containerResources.style.display;
    if (window.innerWidth <= 600){
         if (displayContainer == 'flex') {
        containerResources.style.display = 'none';
        // containerTop.style.marginTop = "-385px";
        arrowResources.style.transform = "rotate(0deg)";
    }else{
        containerResources.style.display = 'flex';
      //  containerTop.style.marginTop = "-524px";
        arrowResources.style.transform = "rotate(90deg)";
    } 
    }
  
})
