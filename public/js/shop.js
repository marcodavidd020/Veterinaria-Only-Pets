const next = document.querySelector('#next')
const prev = document.querySelector('#prev')

const next2 = document.querySelector('#next2')
const prev2 = document.querySelector('#prev2')

const next3 = document.querySelector('#next3')
const prev3 = document.querySelector('#prev3')

const next4 = document.querySelector('#next4')
const prev4 = document.querySelector('#prev4')

function handleScrollNext (direction) {
    const cards = document.querySelector('.con-cards')
    cards.scrollLeft = cards.scrollLeft += window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth - 100
}
function handleScrollPrev (direction) {
    const cards = document.querySelector('.con-cards')
    cards.scrollLeft = cards.scrollLeft -= window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth - 100
}

function handleScrollNext2 (direction) {
    const cards = document.querySelector('.con-cards2')
    cards.scrollLeft = cards.scrollLeft += window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth - 100
}
function handleScrollPrev2 (direction) {
    const cards = document.querySelector('.con-cards2')
    cards.scrollLeft = cards.scrollLeft -= window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth - 100
}

function handleScrollNext3 (direction) {
    const cards = document.querySelector('.con-cards3')
    cards.scrollLeft = cards.scrollLeft += window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth - 100
}
function handleScrollPrev3 (direction) {
    const cards = document.querySelector('.con-cards3')
    cards.scrollLeft = cards.scrollLeft -= window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth - 100
}

function handleScrollNext4 (direction) {
    const cards = document.querySelector('.con-cards4')
    cards.scrollLeft = cards.scrollLeft += window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth - 100
}
function handleScrollPrev4 (direction) {
    const cards = document.querySelector('.con-cards4')
    cards.scrollLeft = cards.scrollLeft -= window.innerWidth / 2 > 600 ? window.innerWidth / 2 : window.innerWidth - 100
}

next.addEventListener('click', handleScrollNext)
prev.addEventListener('click', handleScrollPrev)

next2.addEventListener('click', handleScrollNext2)
prev2.addEventListener('click', handleScrollPrev2)

next3.addEventListener('click', handleScrollNext3)
prev3.addEventListener('click', handleScrollPrev3)

next4.addEventListener('click', handleScrollNext4)
prev4.addEventListener('click', handleScrollPrev4)