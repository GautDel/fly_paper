<x-layout>
    <x-admin.product-panel
        :categories="$categories"
        :variations="$variations"
        :products="$products"
    />

    <x-admin.wiki-panel
        :flyCategories="$flyCategories"
        :flies="$flies"
        :materialCategories="$materialCategories"
        :materials="$materials"
        :fishSpeciesCategories="$fishSpeciesCategories"
        :fishSpecies="$fishSpecies"
    />
</x-layout>
