//###################### Affiche le modal d'un produit lorsque l'on clique sur un produit ###########################

const products_ids = document.querySelectorAll('#div-product') 
const  modalContent = document.querySelector('.modal-content') 

//récupération de l'id produit sélectionné
    products_ids.forEach(product_id => {
        product_id.addEventListener('click', function () {
            const id = product_id.getAttribute('data-product-id')
            displayModalContent ('/simplon-tp-product-hunt/htdocs/src/Partials/product_list_exemple.php',id)
        })
    })
//Requete ajax récupe les données et affiche le modal du produit avec l'id correspondant
function displayModalContent (url,id){
   
    fetch(url)

        .then(response => {
            return response.json()
        })
        .then(datas =>{
            if(document.querySelector('.modal-content div') !== null){
                document.querySelector('.modal-content div').remove('div')
                console.log('deleted')          
            }
            if(document.querySelector('.modal-content div') == null){
                for (let i = 0; i < datas.length; i++) {
                    if(datas[i]['id'] === id){

                    
                        console.log('created')
                        var maDiv = document.createElement('div')
                        maDiv.innerHTML += 

                            //######## Entête du modal #######//
                            '<div class="border mb-5">'
                            +'<div class="row d-flex align-items-center m-4">'
                                +'<img class="modal-thumbnail" src="' + datas[i].thumbnail +'" >'+'</img>'
                                +'<div class="row-lg mt-3">'
                                    +'<h5>' + datas[i].name +'</h5>'+'<br>'
                                    +'<p class = "ml-5">'+ datas[i].summary +'</p>'
                                + '</div>'
                            +'</div>'

                            +'<div class="up row-lg d-flex justify-content-end align-items-center">'
                                + '<div class="col-xl-1 d-flex justify-content-center align-items-center ">'
                                    + '<div class="col-lg-1 d-flex justify-content-center align-items-center ">'
                                        + '<button>UpVote</button>'
                                    +'</div>'
                                +'</div>'
                                + '<div class="col-xl-1 d-flex justify-content-center align-items-center ">'
                                    + '<div class="col-lg-1 d-flex justify-content-center align-items-center">'
                                        +'<img src="/simplon-tp-product-hunt/htdocs/resources/images/up-icon.png"></img>'
                                        +'<h6>'+ datas[i].votesCount+'</h6>'
                                    +'</div>'
                                +'</div>'
                            +'</div>'
                            +'</div>'
                                            
                            +'<hr>'                
                            //######## Corp du modal #######//
                            
                            
                            +'<div class=" mt-5 modalMain mb-5 border">'

                                +'<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">'
                                +'  <div class="carousel-inner">'
                                +'    <div class="carousel-item active">'
                                +'      <img src="' + datas[i].media[0] +'" class="d-block w-100 img-fluid" alt="Responsive image">'
                                +'    </div>'
                                +'    <div class="carousel-item">'
                                +'      <img src="' + datas[i].media[1] +'" class="d-block w-100 img-fluid" alt="Responsive image">'
                                +'    </div>'
                                +'    <div class="carousel-item">'
                                +'      <img src="' + datas[i].media[2] +'" class="d-block w-100 img-fluid" alt="Responsive image">'
                                +'    </div>'
                                +'    <div class="carousel-item">'
                                +'      <img src="' + datas[i].media[3] +'" class="d-block w-100 img-fluid" alt="Responsive image">'
                                +'    </div>'
                                +'  </div>'
                                +'  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">'
                                +'    <span class="carousel-control-prev-icon" aria-hidden="true"></span>'
                                +'    <span class="sr-only">Previous</span>'
                                +'  </a>'
                                +'  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">'
                                +'    <span class="carousel-control-next-icon" aria-hidden="true"></span>'
                                +'    <span class="sr-only">Next</span>'
                                +'  </a>'
                                +'</div>'
                            

                                +'<p class = "mt-5">'+ datas[i].description + '</p>'+'<br>'
                            +'</div>'
                            +'<div class=" mt-5 modalMain mb-5 border">'
                    
                                +'<a href="'+ datas[i].website +'">'+'Site Web'+'</a>'+'<br>'
                                +'<br>' + '<span>' + datas[i].createdAt + '</span>' 
                            +'</div>'
                            

                            
                            +'<hr>' 

                            //######## Commentaire du modal #######//
                            +'<div class=" mt-5 modalMain mb-5 border">'
                                +'<div class="col-sm d-flex justify-content-end align-items-center">'
                                    +'<img  class="img-fluid" src="/simplon-tp-product-hunt/htdocs/resources/images/comment-icon.png"></img>'
                                    +'<h6>'+ datas[i].commentsCount + '</h6>'
                                +'</div>'
                            +'</div>'
                        document.querySelector('.modal-content').appendChild(maDiv)
                        document.querySelector('.modal-content div').classList.add('createdDiv')
                        
                    }
                }
            }
        })
    };


    