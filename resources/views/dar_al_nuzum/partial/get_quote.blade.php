<form action="{{ route('get_quote') }}" name="form-qute" id="form-qute" method="post">
            @csrf
            <div id="popup1" class="overlay">
                <div class="popup">
                <p class="pop-tit">GET QUOTE</p>
                <h2>WE APPRECIATE YOUR CONTACT WITH US AND WE WILL CONTACT YOU AS SOON AS POSSIBLE.
                </h2>

                <div class="form-qute">

                        <div class="lin">
                        <label name="name" class="lbol">Name:</label>
                        <input type="text" name="name" placeholder="Enter Your Name" class="in-p" >
                        </div>
                        <div class="lin">
                        <label name="mobile" class="lbol">Mobile Number:</label>
                        <input type="number" name="mobile" placeholder="Enter Your Number" class="in-p" >
                        </div>
                        <div class="lin">
                        <label name="email" class="lbol">Email:</label>
                        <input type="email" name="email" placeholder="Enter Your Email" class="in-p" >
                        </div>
                        <div class="lin">
                        <label name="company_name" class="lbol">Company Name:</label>
                        <input type="text" name="company_name" placeholder="Enter Your Company Name" class="in-p" >
                        </div>
                        <div class="lin">
                        <label name="category_id" class="lbol" for="service">Service Type:</label>

                        <select name="category_id" id="service" class="in-p selectoo">
                            <option value="">Choose Service ---</option>
                            @foreach ($services as $service )
                                <option value="{{ $service->id }}" {{ old('category') == $service->id ? 'selected' : '' }} >{{ $service->name() }}</option>
                            @endforeach


                        </select>
                        </div>

                </div>
                <div class="main-button-red mar">
                    <div class="scroll-to-section"><button class="btn_submit" type="submit" >Quote Now</button></div>
                </div>
                <a class="close" href="#">&times;</a>

                </div>
            </div>
        </form>
