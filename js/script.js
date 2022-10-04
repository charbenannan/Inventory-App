var sideBarIsOpen = true;


    toggleBtn.addEventListener ( 'click',  (event) => {
     event.preventDefault(); 

     if(sideBarIsOpen){
     sidebar.style.width = '10%';
     sidebar.style.transition = '0.5s all';
     dash.style.width ='90%'; 
     username.style.display = 'none';
     userImage.style.width = '60px';

     menuIcons = document.getElementsByClassName('menuText');
     for(var i=0; i < menuIcons.length; i++){
         menuIcons[i].style.display = 'none';
     }

      document.getElementsByClassName('menu-list')[0].style.textAlign = 'center';
    sideBarIsOpen = false;
    } else{
        sidebar.style.width = '16.5%';
        dash.style.width ='80%';
        username.style.display = 'inline-block';
        userImage.style.width = '115px';

     menuIcons = document.getElementsByClassName('menuText');
     for(var i=0; i < menuIcons.length; i++){
         menuIcons[i].style.display = 'inline-block';
     }

      document.getElementsByClassName('menu-list')[0].style.textAlign = 'left';
    sideBarIsOpen = true;
    }
    });
    
    var header = document.getElementById("myMenu");


   