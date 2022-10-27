window.addEventListener('load',function(){
  let newprices=document.querySelectorAll('span.price');
    for (spanElement of newprices) {
console.log(spanElement);
        spanElement.textContent=Math.ceil(parseInt(spanElement.textContent,10) * 0.95);
      }
    });