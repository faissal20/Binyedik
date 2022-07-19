<section id="about">
        <div class="container about entry">
            <div class="row my-5 section-title ">
                <div class="col-12 d-flex justify-content-center ">
                <h1>
                    About Us
                </h1>
            </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12 d-flex align-items-center justify-content-center" style='background: rgb(248 249 250);'>
                    
                    <p class="py-2">
                        "Bin yedik "une entreprise de marketing et de livraison  permet aux clients d'obtenir les meilleurs produits naturels en quelques minutes.
                    </p>
                </div>
                <div class="col-md-6 col-12">
                    <div id='map' style='width:100%; height: 300px;'></div>
                </div>
            </div>
        </div>
    </section>
     <!-- comments section -->
    
     <section>
        
        <div class="container comments mt-4 ">
            <div class="row mb-5 section-title">
            <div class="col-12 d-flex justify-content-center">
                <h1>
                    Les Responsables 
                </h1>
            </div>
            </div>
            <div class="row  pt-5">
              <div class=" col-md-6 col-12 item p-0 ">
                        <img src="./media/img1.jpg" download='lazy' alt="">
                        <div class="comment p-2">
                            <h4 class="user">
                                Ben Larbi Noura - Gérante
                            </h4>
                            <p>
Je suis organisée, rigoureuse, dynamique et ambitieuse. Je suis capable de finir mon travail jusqu’au bout et au délai précis et de travailler en équipe ce qui me permet de diriger l’équipe « بين يديك ».

                            </p>
                        </div>
                    
                    
                </div>
                
              <div class=" col-md-6 col-12 item p-0 ">
                    <img src="./media/img4.jpg" download='lazy' alt="">
                    <div class="comment p-2">
                        <h4 class="user">
                             Bouhda Soukaina - Responsable Marketing et Communication
                        </h4>
                        <p>
Je suis sérieuse dynamique, motivée et ponctuelle. Je possède des techniques de communication qui vont me permettre d’accomplir les taches du marketing, de communiquer et d'être à l’écoute des différents clients de « بين يديك »
 
                        </p>
                    </div>
                
                
                </div>
              <div class=" col-md-6 col-12 item p-0 ">
                    <img src="./media/img5.jpg" download='lazy' alt="">
                    <div class="comment p-2">
                        <h4 class="user">
                           Chaklal Fatimazohra - Responsable juridique
                        </h4>
                        <p>
                           
Je suis une personne rigoureuse,organiseé et methodique et optimiste pour faire encore le meilleur dans la vie ,j'ai egalement l'esprit fort de critique et d'analyse  ainsi une vision strategique ainsi des competences principalement à la compatabilite et gestion.

                        </p>
                    </div>
                
                
                </div><div class=" col-md-6 col-12 item p-0 ">
                        <img src="media/img2.jpg" download='lazy' alt="">
                        <div class="comment p-2">
                            <h4 class="user">
                                Ben Allal Hamza -responsable de stock et approvisionnement
                            </h4>
                            <p>
                               Un jeune homme rigoureux et dynamique, je m’occupe à l’étude de marché et les moyennes techniques que nous avons besoin pour élaborer notre projet. J’ai un esprit d’équipe et d’analyse qui me permet de bien réaliser mes tâches avec une ouverture d’esprit suffisamment élargie. 
                            </p>
                        </div>
    
                </div>
                <div class=" col-md-6 col-12 item p-0 ">
                    <img src="./media/img6.jpeg" download='lazy' alt="">
                    <div class="comment p-2">
                        <h4 class="user">
                            Akrraouch Bouyazem Othman - Responsable d'achat
                        </h4>
                        <p>
                            Ingénieur de 23ans, dynamique, sérieux et ponctuel. Mes études et mes expériences m’ont permis d’acquérir un sens d’organisation, un sens de contact ainsi qu’une grande adaptation face aux différents types de personnes. 
                        </p>
                    </div>
                
                
                </div>
            </div>
        </div>
    </section>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.5.1/mapbox-gl.js'></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZmFpc3NhbDE4IiwiYSI6ImNrdjN1dXVrZDA3YmIyb2x3aTMxMzM3Y2EifQ.4c-7K_eyrb5cQicDAmtkBw';
        const map = new mapboxgl.Map({
        container: 'map', // container ID
        center: [-5.350460935242438, 35.57750512382398], // starting position [lng, lat]
        zoom: 15,
        style: 'mapbox://styles/mapbox/streets-v11'
        });
        const marker = new mapboxgl.Marker()
        .setLngLat([30.5, 50.5])
        .addTo(map);
        </script>
