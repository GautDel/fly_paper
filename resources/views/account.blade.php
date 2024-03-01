<x-layout>

    <div class="mx-auto border-neutral-700 ">
        <x-account.order-accordian :orders="$orders" />

        <x-account.comments-accordian :flyComments="$flyComments" :postComments="$postComments" />

        <x-account.posts-accordian :posts="$posts" />

        <x-account.account-accordian :errors="$errors" :username="$username" :email="$email" :about="$about" />

        <div class="w-full flex justify-center mt-10">
            <pre class="md:hidden">
           '\
       ____' \    {)
       \   |  \@  (_/   Rats!
      __)  |   `\/|
     (___-_)    __|      *    *
              //| |    (/   )/
-~-~-~-~-~-~"""""""""*""""""*""
~-~-~-~""ejm97""""")/"""""(/""
            </pre>

        </div>
        <div class="w-full flex justify-center">
            <pre class="hidden md:block">
                            ,
                       /(  /:./\
                    ,_/:`-/::/::/\_ ,
                    |:|::/::/::/::;'( ,,
                    |:|:/::/::/:;'::,':(.( ,
                _,-'"HHHHH"""HHoo--.::::,-:(,----..._
            ,-"HHHb  "HHHHb  HHHHb   HHHoo-.::::::::::-.
          ,'   "HHHb  "HHHHb "HHHH   HHHHH  Hoo::::::::::.              _,.-::`.
        ,'      "HH`.  "HHHH  HHHHb  "HHHH  "HHHb`-:::::::.        _.-:::::::;'
       / ,-.        :   HHHH  "HHHH   HHHH   HHHH  Hoo::::;    _,-:::::::::;'
     ,'  `-'        :   HHHH   HHHH   "HHH   "HHH  "HHHH-:._,o:::::::::::;'
    /               :   HHHH __HHHP...........HHH   HHHF   HHH:::::::;:;'
   /_               ; _,-::::::.:::::::::::::''HH   HHH    "HH::::::::(
   (_"-.,          /  : :.::.:.::::::::::,d   HHH   "HH     HH::::::::::.
    (,-'          /    :.::.:::.::::::;'HHH   "HH    HH,::"-.H::::::::::::.
     ".         ,'    : :.:::.::::::;'  "HH    HH   _H-:::)   `-::::::::::::.
       `-.___,-'       `-.:::::,--'"     "H    HH,-::::::/        "--.::::::::.
            """---..__________________,-------'::::::::;/               """---'
                        \::.:---. Krogg    `::::::::::;'
                         \::::::|            `::;-'""
                          `.::::|
                            `.::| Sheepshead (Archosargus probatocephalus)
                              `-'
            </pre>
        </div>
    </div>
</x-layout>
