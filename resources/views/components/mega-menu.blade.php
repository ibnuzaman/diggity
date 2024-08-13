<div {{ $attributes }}
    class="absolute z-50 max-w-screen-lg mx-auto mt-1 border-gray-200 shadow-sm start-0 end-0 rounded-xl bg-gray-50 md:bg-white border-y dark:bg-gray-800 dark:border-gray-600">
    <div class="flex px-4 py-5 mx-auto text-gray-900 lg:gap-8 xl:gap-16 max-h-fit dark:text-white md:px-6">
        <ul class="max-w-[290px]">
            {{ $link }}
        </ul>
        <div class="border-x border-grayish-blue">
        </div>
        {{ $content }}
    </div>
</div>
