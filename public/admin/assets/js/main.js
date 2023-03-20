// Get Currant date
let myDate = new Date()
setMonth = myDate.getMonth() < 10 ? "0"+ (myDate.getMonth()+1): myDate.getMonth()
setDay = myDate.getDate() < 10 ? "0" + myDate.getDate() : myDate.getDate()
let currDate =`${myDate.getFullYear() +"-"+ setMonth +"-"+ setDay}`
document.querySelector('.date-area input').value=currDate


// Start Header
document.querySelector(".toggle-sidebar").onclick=()=>{
  document.querySelector('.sidebar').classList.toggle('show')
  document.querySelector('.container-wrapper').classList.toggle('full')
  document.querySelector('.header').classList.toggle('full')
}
document.querySelector(".header-user").onclick=()=>{
  document.querySelector('.user-drop-down').classList.toggle('active')
}
document.querySelector(".settings-icon").onclick=()=>{
  document.querySelector(".settings-area").classList.add("show")
  document.querySelector(".overly").style.display = "block"
}
document.querySelector(".close-settings").onclick=()=>{
  document.querySelector(".settings-area").classList.remove("show")
  document.querySelector(".overly").style.display = "none"
}
let handleLight = ()=>{
  document.querySelector(".dot-dark").classList.remove("active")
  document.querySelector(".dot-light").classList.add("active")
}
let handleDark = ()=>{
  document.querySelector(".dot-light").classList.remove("active")
  document.querySelector(".dot-dark").classList.add("active")
}
let handleTheme = (theme)=>{
  if(theme =="dark"){
    document.body.classList.add("is-dark")
    localStorage.setItem('color_option','green')
  }else{
    document.body.classList.remove("is-dark")
    localStorage.clear();
  }
}

// Preview image form
let myImage = document.getElementById('image')
let beforeImage = document.getElementById('preview-image-before-upload')
if(myImage || beforeImage){
  myImage.addEventListener("change",function(){  
    let reader = new FileReader();
    reader.addEventListener("load",(e)=>{ 
      beforeImage.setAttribute('src', e.target.result);}
    )
    reader.readAsDataURL(this.files[0]); 
   }
  )
}

// handle event messages
window.setInterval(()=>{
  if(document.querySelector(".handle-event")){
    document.querySelector(".handle-event").style.display = "none"
  }
},5000)


// Check local storage of Theme
if(localStorage.getItem('color_option')){
  document.body.classList.add("is-dark")
  window.addEventListener('load',()=>{
    document.querySelector(".dot-dark").classList.add("active")
    document.querySelector(".dot-light").classList.remove("active")
  })
}

// Check local storage of main color
if(localStorage.getItem('listColor')){
  document.documentElement.style.setProperty("--main-color",localStorage.getItem('listColor'))
}

// List Colors
let listColors = document.querySelectorAll(".colors li.color")
if(listColors){
  listColors.forEach(col=>{
    col.addEventListener('click',(e)=>{
      document.documentElement.style.setProperty("--main-color",e.target.dataset.color)
      listColors.forEach(col1=>{
        col1.classList.remove("active")
      })
    col.classList.add("active")
    localStorage.setItem('listColor',e.target.dataset.color)
  })
})
}

// Start Sidebar
document.querySelectorAll(".drop-down").forEach(drop=>{
  drop.onclick =(e)=>{
    let parentItem = e.target.parentElement
    parentItem.classList.toggle("showMenu")
    e.target.parentElement.parentElement.classList.toggle("showMenu")
  }
})

// Progress Area 
let spans = document.querySelectorAll('.progress-section .progress-size')
if(spans){
  spans.forEach(span=>{
    span.style.width = span.dataset.width
  })
}

// Start add product page
let form_details = document.querySelectorAll(".form-details input");
if(form_details){
  form_details.forEach(input=>{
    input.onclick =(e)=>{
      let placeholder = e.target.placeholder;
      e.target.placeholder =""
      input.onblur = (e)=>{
        e.target.placeholder = placeholder
      }
    }

  })
}

let select_category = document.querySelector(".select_category");
if(select_category){
  document.getElementById("sub_category").style.display= "none"
  select_category.onchange =()=>{
    document.getElementById("sub_category").style.display= "block"
  }
}
