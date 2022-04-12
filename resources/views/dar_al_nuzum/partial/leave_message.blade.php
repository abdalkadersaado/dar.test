<section id="message">
             <button id="myBtn"><img src="{{ asset('assets/images/message.png') }}"></button>
            <div id="myModal" class="modal">
                <form action="{{ route('frontend.do_contact') }}" method="POST">
                    @csrf
                    <div class="modal-contentr">
                            <div class="modale-header">
                                <span class="close">&times;</span>
                                <p class="mes-tit">Leave A Message</p>
                            </div>
                         <div class="modale-body">
                                <p class="sorry">Sorry, we aren't online at the moment. Leave a message and we'll get back to you.
                                </p>

                                <div class="forn">

                                    <label for="name" class="vui">Name</label>
                                    <input type="text" name="name" class="mes-in">

                                    <label for="email" class="vui">Email</label>
                                    <input type="email" name="email" class="mes-in">

                                    <label for="mobile" class="vui">Phone Number</label>
                                    <input type="number" name="mobile" class="mes-in">

                                    <label for="title" class="vui">subject</label>
                                    <input type="text" name="title" class="mes-in">

                                    <label for="message" class="vui">Message</label>
                                    <textarea name="message" class="mes-in ui"></textarea>

                                </div>

                                <div class="main-button-redi marb">
                                    <div class="scroll-to-section"><button type="submit"  class="btn_submit" >Send Message</button></div>
                                </div>
                            </div>

                    </div>
                </form>

            </div>
        </section>
