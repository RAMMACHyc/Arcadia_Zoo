@include('navbar')

    <!-- end -->

    <!-- home -->

    <section class="home" id="home">
        <div class="content">
            <h3>Profitez du merveilleux Aventure du  Animaux</h3>
            <a href="#" class="btn">rencontrez le zoo</a>
            
        </div>
        <div class="icon-scroll"></div>
        <!-- <img src="images/bottom_wave.png" alt="" class="wave"> -->

    </section>

    <!-- end -->

    <!-- about -->

    <section class="about" id="about">

        <h2 class="deco-title">About us</h2>

        <div class="box-container">
            
            <div class="image">
                <img src="{{ asset('images/logo.jpeg') }}">
            </div>
     
            <div class="content">
                <h3 class="title">Arcadia, une ode à la nature</h3>
                <p>Arcadia est un zoo situé en France près de la forêt de Brocéliande, en bretagne depuis 1960. Ils possèdent tout un panel d’animaux, réparti par habitat (savane, jungle, marais) et font extrêmement attention à leurs santés. Chaque jour, plusieurs vétérinaires viennent afin d’effectuer les contrôles sur chaque animal avant l’ouverture du zoo afin de s’assurer que tout se passe bien, de même, toute la nourriture donnée est calculée afin d’avoir le bon grammage (le bon grammage est précisé dans le rapport du vétérinaire).</p>
              
            </div>

        </div>

    </section>


    <!-- end -->

    <!-- gallery -->

    <section class="gallery" id="gallery">
        <div class="swiper gallery-slider">

            <div class="swiper-wrapper">

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/gallery-1.jpg" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/gallery-2.jpg" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/gallery-3.jpg" alt="">
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="image">
                        <img src="images/gallery-4.jpg" alt="">
                    </div>
                </div>

            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </section>

    <!-- end -->

    <!-- animals -->

 
    <section class="animal" id="animal">
        <h2 class="heading">animals</h2>
        @if ($animals->isEmpty())
        
            <div class="flex justify-center ">
                <div class="w-44 h-44"><img src="{{ asset('images/9067876.jpg') }}"></div>
            
            </div>
            <div class="text-center">
            <h2 class="text-gray-600 text-2xl font-medium text-center">No animals available...</h2>
            </div>
            @else
        <div class="box-container">
            @foreach ($animals->take(4) as $animal)
            <div class="box initial-visible">
                <img src="{{ asset($animal->image) }}" alt="animal">
                <div class="content">
                    <h3>{{ $animal->prenom }}</h3>
                    <a href="#" class="btn"><i class="fa-regular fa-eye"></i> </a>
                </div>
            </div>
            @endforeach
    
            @foreach ($animals->skip(4) as $animal)
            <div class="initially-hidden">
            <div class="box">
                <img src="{{ asset($animal->image) }}" alt="animal">
                <div class="content">
                    <h3>{{ $animal->prenom }}</h3>
                    <a href="#" class="btn"><i class="fa-regular fa-eye"></i> </a>
                </div>
            </div>
            </div>
            @endforeach
        </div>
    
        <div class="more">
            <button id="show-more-btn">Plus d'animaux <i class="fa-solid fa-angles-right"></i></button>
        </div>
        @endif
    </section>

    <!-- end -->

    <!-- banner -->

    <section class="banner">
       <div class="imgbanner"></div>
        <div class="row">
            
            <div class="content">
                <h3>stay with pets</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Saepe doloremque rem reiciendis beatae, ut tempora. Et dolorem enim, iusto autem eaque harum. 
                Ex praesentium commodi sequi culpa eius fugit vel.</p> 
            </div>

            <div class="image">
                <img src="images/banner_1.png" alt="">
            </div>
            
        </div>
        

    </section>

    <!-- end -->

    <!-- pricing -->

    <section class="pricing" id="pricing">

        


    </section>

    <!-- end -->

    <!-- contact -->

    <section class="contact" id="contact">

        <h2 class="heading">contact</h2>

        <form action="">

            <div class="inputBox">
                <input type="text" placeholder="name">
                <input type="email" placeholder="email">
            </div>

            <div class="inputBox">
                <input type="number" placeholder="number">
                <input type="text" placeholder="subject">
            </div>

            <textarea name="" id="" cols="30" rows="10" placeholder="meassage"></textarea>

            <a href="#" class="btn">send message</a>

        </form>

    </section>

    <!-- end -->

    <!-- footer -->
    @include('footer')