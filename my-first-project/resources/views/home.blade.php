<x-based>

<x-slot name="name">
    Sam
</x-slot>

<x-slot name="content">

<h1>Home</h1>

@if ($name == "Sam")
<h1>Welcome Mogar</h1>
@else
<h1>Welcome Imposter</h1>
@endif

<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident repellendus ipsa, iure quae voluptas error et reprehenderit optio consectetur laborum molestias iusto eveniet nulla ratione officia architecto nihil, numquam atque. </p>

</x-slot>

</x-based>