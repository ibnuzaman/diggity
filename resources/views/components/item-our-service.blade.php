<div class="flex bg-white rounded shadow-card xl:p-6 lg:p-3.5 xl:gap-6 lg:gap-3.5 max-h-72">
    <img {{ $attributes }} alt="icon service card" class="object-cover rounded-lg w-80">
    <div class="flex flex-col justify-center lg:gap-3.5 xl:gap-6">
        <h3 class="heading-three">{{ $title }}</h3>
        <p class="paragraph">
            {{ $description }}
        </p>
    </div>
</div>
