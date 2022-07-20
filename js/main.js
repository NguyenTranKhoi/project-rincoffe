// Slider
var index = 0
const rightbtntwo = document.querySelector('.fa-chevron-right-two')
const leftbtntwo = document.querySelector('.fa-chevron-left-two')
const imgNubertwo = document.querySelectorAll('.special_content')
    // console.log(rightbtntwo)
    // console.log(leftbtntwo)
rightbtntwo.addEventListener("click", function() {
    index = index + 1
    if (index > imgNubertwo.length - 1) {
        index = 0
    }
    document.querySelector(".special_content-box").style.right = index * 100 + "%"
})
leftbtntwo.addEventListener("click", function() {
    index = index - 1
    if (index <= 0) {
        index = imgNubertwo.length - 1
    }
    document.querySelector(".special_content-box").style.right = index * 100 + "%"
})