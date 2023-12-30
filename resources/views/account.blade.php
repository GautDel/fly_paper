<x-layout>

    <div class="mx-auto border-neutral-700 ">

        <x-account.comments-accordian :flyComments="$flyComments" />

        <x-account.posts-accordian />

        <x-account.account-accordian
                :errors="$errors"
                :username="$username"
                :email="$email"
                :about="$about"
        />
    </div>
</x-layout>
