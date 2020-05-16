//###################### Affiche le modal d'un produit lorsque l'on clique sur un produit ###########################

const products_ids = document.querySelectorAll('#div-product') 
const  modalContent = document.querySelector('.modal-content') 
const  btn_upVotes = document.querySelectorAll('#btn_upVote') 


//Lancement de la requete au produit sélectionné
    products_ids.forEach(product_id => { 

        //Récupération des data attribute
        const productName = product_id.getAttribute('data-product-name')   
        const productVoteCount = document.querySelector('.voteCount')
        const productSummary = product_id.getAttribute('data-product-summary')
        const productWebsite = product_id.getAttribute('data-product-website')
        const productIcon = product_id.getAttribute('data-product-img')
        const id = product_id.getAttribute('data-product-id')


        //Ecouteur d'évenement sur la div
        product_id.addEventListener('click', function () {

            displayModalContent ('?controller=ProductHuntAPI&endpoint=Product&product_id='+id,productName,productVoteCount,productSummary,productWebsite,productIcon)
        })
    })
    btn_upVotes.forEach(btn_upVote => { 


        const userId = btn_upVote.getAttribute('data-user-id')
        const id = btn_upVote.getAttribute('data-product-id')
        const userVoted = btn_upVote.getAttribute('data-user-id-voted')

        if (userVoted == true) {
            
            btn_upVote.classList.add('btn-info')
            btn_upVote.classList.add('bg-info')
            btn_upVote.classList.add('disabled')

        }else{ 
            
        btn_upVote.addEventListener('click', function (event) {

                    event.stopPropagation();
            listVote('?controller=ProductHuntAPI&endpoint=Vote&user_id='+ userId +'&product_id='+id);
            this.classList.add('disabled')
        },true)  
             
        }

    
    })        

        function listVote(url){
            fetch(url,{method: "POST"})
            .then(response => {
                console.log(response)
                return response;
            })
            .then(data =>{
                console.log(data)
            })
        }

//Requete ajax récupe les données et affiche le modal du produit avec l'id correspondant
function displayModalContent (url,productName,productVoteCount,productSummary,productWebsite,productIcon){
   
    fetch(url)

        .then(response => {
            return response.json()
        })
        .then(datas =>{
            console.log(datas)
            if(document.querySelector('.modal-content div') !== null){
                document.querySelector('.modal-content div').remove('div')
                //console.log('deleted')          
            }
            if(document.querySelector('.modal-content div') == null){
              
                //console.log('created')
                var maDiv = document.createElement('div')

                
                let modal =   
                    //######## Entête du modal #######//                          
                        '<div class="border mb-5">'
                            +'<div class="row d-flex align-items-center m-4">'
                                +'<img class="modal-thumbnail" src="'+ productIcon +'" >'+'</img>'
                                +'<div class="row-lg mt-3">'
                                    +'<h5>' + productName +'</h5>'+'<br>'
                                    +'<p class = "ml-5">'+ productSummary +'</p>'
                                + '</div>'
                            +'</div>'

                            +'<div class="up row-lg d-flex justify-content-end align-items-center">'
                                + '<div class="col-xl-1 d-flex justify-content-center align-items-center ">'
                                    + '<div class="col-lg-1 d-flex justify-content-center align-items-center ">'
                                        + '<button class="btn btn-outline-secondary">UpVote</button>'
                                    +'</div>'
                                +'</div>'
                                + '<div class="col-xl-1 d-flex justify-content-center align-items-center ">'
                                    + '<div class="col-lg-1 d-flex justify-content-center align-items-center">'
                                        +'<img src="./public/images/icons/upvote.png"></img>'
                                        +'<h6>'+ productVoteCount.textContent +'</h6>'
                                    +'</div>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                                        
                        +'<hr>'                
                        //######## Corp du modal #######//

                        +'<div class=" mt-5 modalMain mb-4 border">'
                
                            +'<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">'
                            +'  <div class="carousel-inner">';
                            
            for (let j = 0; j < datas.media.length; j++) {
                if (j === 0){
                    active = 'active'
                }else{
                    active = ''
                }
                modal += '<div class="carousel-item'+ active +'">'
                        +'<img src="' + datas.media[j] +'" class=" w-100 img-fluid" >'
                        +'</div>'

            }
            modal +=
               '  </div>'
               +'  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">'
               +'    <span class="carousel-control-prev-icon" aria-hidden="true"></span>'
               +'    <span class="sr-only">Previous</span>'
               +'  </a>'
               +'  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">'
               +'    <span class="carousel-control-next-icon" aria-hidden="true"></span>'
               +'    <span class="sr-only">Next</span>'
               +'  </a>'
               +'</div>'
                    

                       +'<p class = "mt-5">'+ datas.content + '</p>'+'<br>'
                    +'</div>'
                    +'<div class=" mt-5 modalMain mb-4 border">'
                        +'<img src="public/images/icons/website-link.png" style="width:50px"></img>'
                        +'<a href="'+ productWebsite+'">'+'Site Web'+'</a>'+'<br>'
                    +'</div>'

                    +'<hr>'; 
                    modal +=

                    //######## Commentaire du modal #######//
                    '<div class=" mt-5 modalMain mb-4 border">'
                        +'<div class="col-1-sm d-flex justify-content-around align-items-center">'
                        +'<h6>'+ 'Commentaires : ' + '</h6>'
                        
                    
                            +'<img  class="img-fluid"style="width:50px" src="./public/images/icons/comments.png"></img>'
                            
                        
                        +'</div>';
                        
            for (let k = 0; k < datas.comments.length; k++) {
            
                modal +='<hr>'
                        +'<div class=" row justify-content-start align-items-center ml-3 ">'
                        +'<h6 class="mb-5">'+ datas.comments[k].name + '</h6>'+'<br>'
                        +'</div>'
                        +'<div class=" row justify-content-start align-items-center ml-5 mb-2">'
                        +'<p>'+ datas.comments[k].content + '</p>'
                        +'</div>'                        
                        +'<div class=" row justify-content-start align-items-center ml-3 ">'
                        +'<p style="font-size:8pt">'+ 'Envoyé a : '+ datas.comments[k].created_at + '</p>'
                        +'</div>'                        
            }
                    
            modal += '<hr>'
                    +'<div class="input-group mb-3 mt-3 ">'
                        
                        +'<input type="text" class="form-control" placeholder="Commenter..."  aria-describedby="button-addon2">'
                            +'<div class="input-group-append">'
                            +'  <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>'
                            +'</div>'
                        +'</div>'
                    +'</div>'    
                    +'</div>';
                    maDiv.innerHTML += modal
                document.querySelector('.modal-content').appendChild(maDiv)
                document.querySelector('.modal-content div').classList.add('createdDiv')
                        
                    
                
            }
        })
    };


