
const slideshow = document.querySelector('.slideshow');
const buttons = document.querySelectorAll('.button_tonggle');
const buttonCount = buttons.length;
const showCount = 3;
let currentIndex = 0;

function showButtons(startIndex) {
  const endIndex = Math.min(startIndex + showCount, buttonCount);
  for (let i = 0; i < buttonCount; i++) {
    buttons[i].style.display = (i >= startIndex && i < endIndex) ? 'inline-block' : 'none';
  }
}

function next() {
  currentIndex = (currentIndex + showCount) % buttonCount;
  showButtons(currentIndex);
}

function previous() {
  currentIndex = (currentIndex - showCount + buttonCount) % buttonCount;
  showButtons(currentIndex);
}

showButtons(currentIndex);
/////////////////////////////////////////////////////////////////




