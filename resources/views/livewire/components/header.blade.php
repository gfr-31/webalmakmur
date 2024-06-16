<div>
    <header id="header" class=" header">
        <div class=" container">
            <div class=" p-2 mt-3 " style="display: flex; align-items: center;">
                <div class="  ">
                    <a href="#" class=" " wire:click.prevent="linkTo('home')">
                        <img src="{{ asset('assets/Logo-Header.png') }}" style="width: 200px;" class=" ">
                    </a>
                </div>
                <div class="tengah  px-5">
                    <ul style="display:flex ;list-style-type: none; align-items:center" class=" m-auto">
                        <li>
                            <a href="https://www.facebook.com" class="fb-button" target="_blank">
                                <i class=" fa-brands fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="fb-button" target="_blank">
                                <i class="fa-brands fa-square-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="fb-button" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        </li>
                        <li>
                            <a href="" class="fb-button" target="_blank">
                                <i class="fa-brands fa-square-x-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div style="display: flex">
                    <div class="px-1" style="display: flex; ">
                        <div class="px-3">
                            <img width="44" height="44" src="{{ asset('assets/icons8-telephone-64.png') }}"
                                alt="phone" />
                        </div>
                        <div class=" ">
                            <small style="margin: 0;padding:0">Telephone</small>
                            <p style="margin: 0;padding:0"><b>0812335446</b></p>
                        </div>
                    </div>
                    <div class=" mx-4" style="border-left: 2px solid black"></div>
                    <div class="  px-1 " style="display: flex; ">
                        <div class="  px-3">
                            <img width="44" height="44" src="{{ asset('assets/icons8-email-100.png') }}"
                                alt="phone" />
                        </div>
                        <div class=" ">
                            <small style="margin: 0;padding:0">Email</small>
                            <p style="margin: 0;padding:0"><b>mtsalmakmur@gmail.com</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
