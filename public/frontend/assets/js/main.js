/*--------- Start Header section ---------*/
window.addEventListener("scroll",function(){
  let calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight
  let toup = document.getElementById('toup')
  let scrollTop = document.documentElement.scrollTop;

  if(scrollTop == 0){
    toup.style.opacity="0";
  }else{
    toup.style.opacity="1";
    toup.addEventListener('click',()=>{
      document.documentElement.scrollTo(0,0);
    })
  }

  if(scrollTop >= 200){
    document.querySelector(".main-header").classList.add("sticky")
  }else{
    document.querySelector(".main-header").classList.remove("sticky")
  }
})
let categories_icon = document.querySelector(".categories-icon")
let menus_icon = document.querySelector(".menus-icon")
if(categories_icon && menus_icon){
  categories_icon.onclick = ()=>{
    document.querySelector(".categories-menu").classList.toggle("mobile-menu")
    document.querySelector(".list-menus").classList.remove("mobile-menu")
  }
  
  menus_icon.onclick = ()=>{
    document.querySelector(".list-menus").classList.toggle("mobile-menu")
    document.querySelector(".categories-menu").classList.remove("mobile-menu")
  }
}



/*--------- Start Calc Quantity ---------*/
let calctotal = 0
let subtotals = document.querySelectorAll(".align-middle td .product-sub-price")
let minus     = document.querySelectorAll(".align-middle td #minus")
let total     = document.getElementById("total")
let totalwithshipping     = document.getElementById("totalwithshipping")
let plus      = document.querySelectorAll(".align-middle td #plus")
subtotals.forEach(sub=>{
  calctotal += parseInt(sub.value,10)
  total.value = calctotal +"$"
  if(totalwithshipping){
    totalwithshipping.value = total.value
  }
})
minus.forEach((min)=>{
  min.onclick = (e)=>{

    let getdata = e.currentTarget.dataset['calc']
    let getdataqte = e.currentTarget.dataset['qte']
    let getdproductprice = e.currentTarget.dataset['price']

    let product_sub_price = document.getElementById(getdata)

    if(document.getElementById(getdataqte).value > 1){
      calctotal -= parseInt(product_sub_price.value,10)
      document.getElementById(getdataqte).value --
      let product_qte   = document.getElementById(getdataqte).value
      let product_price = document.getElementById(getdproductprice).value
      product_sub_price.value =  `${parseInt(product_qte,10) * parseInt(product_price,10)} $`
      calctotal += parseInt(product_sub_price.value,10)
      total.value = calctotal +"$"
      if(totalwithshipping){
        totalwithshipping.value = total.value
      }
    }
  }
})
plus.forEach((pl)=>{
  pl.onclick = (e)=>{
    let getdata = e.currentTarget.dataset['calc']
    let getdataqte = e.currentTarget.dataset['qte']
    let product_sub_price = document.getElementById(`${getdata}`)
    calctotal -= parseInt(product_sub_price.value,10)

    document.getElementById(getdataqte).value ++
    let product_qte         = document.getElementById(getdataqte).value
    let product_price       = document.querySelector(`.${getdataqte}`).value
    product_sub_price.value =  `${parseInt(product_qte,10) * parseInt(product_price,10)} $`
    
    calctotal += parseInt(product_sub_price.value,10)
    total.value = calctotal +"$"
    if(totalwithshipping){
      totalwithshipping.value = total.value
    }
  }
})



/*--------- Start Featured categories ---------*/
let f_categories = document.querySelectorAll(".featured-header-categories .featured-header-category")
let f_items = document.querySelectorAll(".featured-categories .featured-items")
if(f_categories){
  if(f_categories[0]){
    f_categories[0].classList.add("active")
  }
  f_categories.forEach(f_cat=>{
    f_cat.onclick = (e)=>{
      f_categories.forEach(f_cat_act=>{
        f_cat_act.classList.remove('active')
      })
      f_items.forEach(f_cat_item=>{
        f_cat_item.style.display ='none'
      })
      e.currentTarget.classList.add("active")
      document.getElementById(e.currentTarget.dataset["cat"]).style.display ='block'
    }
  })
}



/*--------- Start Product details ---------*/
let qte_minus = document.querySelector(".product-details .cart-quantity #minus")
let qte_plus  = document.querySelector(".product-details .cart-quantity #plus")
if(qte_minus && qte_plus){
  qte_minus.addEventListener("click",()=>{
    if(document.querySelector('.product-quantity').value > 1){
      document.querySelector('.product-quantity').value --
    }
  })
  
  qte_plus.onclick = ()=>{
    document.querySelector('.product-quantity').value ++
  }
}


/*--------- Start checkout ---------*/
let checkoutform = document.getElementById("checkout-form")
let cod = document.getElementById("cod")
if(checkoutform || cod){
  checkoutform.onsubmit = (e)=>{
    e.preventDefault()
    let terms = document.getElementById("terms")
    let payment_method = document.getElementsByName("payment-method")
    let inputs = document.querySelectorAll(".billing-details .form-section input")
    
    // Inputs validation
    inputs.forEach((input)=>{
      input.oninput = ()=>{
        input.style.border = "1px solid var(--main-color)"
        input.style.backround = "var(--bg-color)"
      }
      if(input.value == ""){
        input.style.border = "1px solid red"
      }else{
        input.style.border = "1px solid var(--main-color)"
        input.style.backround = "var(--bg-color)"
      }
    })
  
    // Payment methods validation
    if(payment_method[0].checked || payment_method[1].checked || payment_method[2].checked){
      document.querySelector(".payment-error").innerHTML = ''
    }else{
      document.querySelector(".payment-error").style.color ="red"
      document.querySelector(".payment-error").innerHTML = 'Please Select payment method'
    } 
      
    // Terms conditions validation
    if(!terms.checked){
      document.querySelector(".terms").style.color="red"
    }else{
      document.querySelector(".terms").style.color="black"
    }
  }
  cod.onclick = ()=>{
    document.querySelector(".cod").classList.add("dblock")
  }
}

/*--------- Start Hidden Cart ---------*/
let closeCart = document.getElementById("close-cart")
let countercart = document.getElementById("countercart")
if(closeCart || cart){
  document.getElementById("shopping-cart").onclick = ()=>{
    document.querySelector(".cart-hidden").classList.add("active")
  }
  closeCart.onclick = ()=>{
    document.querySelector(".cart-hidden").classList.remove("active")
  }
}
let product_overly = document.querySelector(".product-overly")

/*--------- Start Shop page  ---------*/
let shoppriceto = document.getElementById("shoppriceto")
let shoppricefrom = document.getElementById("shoppricefrom")
if(shoppriceto && shoppricefrom){
  shoppriceto.onchange = ()=>{
    document.querySelector(".price-to").innerHTML = shoppriceto.value + "$"
  }
  shoppricefrom.onchange = ()=>{
    document.querySelector(".price-from").innerHTML = shoppricefrom.value + "$"
  }
}

/*--------- Start Footer  ---------*/
// Get Currant date
let myDate = new Date()
let credit_date = document.querySelector(".credit-date")
if(credit_date){
  credit_date.innerHTML = myDate.getFullYear()
}