const fileCardTemplate= document.querySelector("[data-name-template]");
const fileCardsContainer = document.querySelector("[data-name-cards-container]");
const searchInput = document.querySelector("[data-search]");



let names = [];

searchInput.addEventListener("input", (e)=>{
    const value = e.target.value.toLowerCase();
    names.forEach(user => {
        const isVisible = user.name.toLowerCase().includes(value)
        user.element.classList.toggle("hide", !isVisible)
    })
    console.log(names);
})


fetch('js/json.php')
.then(res => res.json()).then(data => {
  names  =  data.map(name=>{
 const card = fileCardTemplate.content.cloneNode(true).children[0];
 const header = card.querySelector("[data-header]");
 const body = card.querySelector("[data-body]");
 header.textContent= name.id;
 body.textContent = name.name;
 fileCardsContainer.append(card);
 
 return{id:name.id, name:name.name, element: card}
 
 
})

})