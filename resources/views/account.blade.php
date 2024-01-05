<x-layout>

    <div class="mx-auto border-neutral-700 ">

        <x-account.comments-accordian
            :flyComments="$flyComments"
            :postComments="$postComments" />

        <x-account.posts-accordian :posts="$posts"/>

        <x-account.account-accordian
            :errors="$errors"
            :username="$username"
            :email="$email"
            :about="$about"/>

    </div>
</x-layout>
