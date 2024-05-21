@include('navbar')

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

@include('footer')