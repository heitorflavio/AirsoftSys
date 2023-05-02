
// esconde o preloader assim que a página é totalmente carregada
window.addEventListener('load', function() {
  var preloader = document.querySelector('.preloader');
  this.setTimeout(() => {
    preloader.style.display = 'none';
  },2000)
});

