<x-app-layout>
    <div class="filters flex space-x-6">
        <div class="w-1/3">
            <select name="category" id="category" class="w-full border-none rounded-xl px-4 py-2">
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
            </select>
        </div>
        <div class="w-1/3">
            <select name="other_filters" id="other_filters" class="w-full border-none rounded-xl px-4 py-2">
                <option value="1">Other Filter 1</option>
                <option value="2">Other Filter 2</option>
            </select>
        </div>
        <div class="w-2/3 relative">
            <input type="search" placeholder="Find an idea"
                   class="w-full placeholder-gray-900 rounded-xl bg-white px-4 py-2 pl-8 border-none">
            <div class="absolute top-0 flex items-center h-full ml-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="ideas-container space-y-6 my-6">

        @for($i=1;$i<6;$i++)
        <div class="idea-container bg-white rounded-xl flex hover:shadow-md transition duration-150 ease-in cursor-pointer">
            <div class="border-r border-gray-100 px-5 py-8">
                <div class="text-center">
                    <div class="font-semibold text-2xl">12</div>
                    <div class="text-gray-500">Votes</div>
                </div>
                <div class="mt-8">
                    <button class="w-20 bg-gray-200 border-gray-200 hover:border-gray-400 font-bold text-xxs
                    uppercase rounded-xl px-4 py-3 transition duration-150 ease-in">
                        Vote
                    </button>
                </div>
            </div>
            <div class="flex px-2 py-6">
                <a href="#" class="flex-none">
                    <img src="https://source.unsplash.com/200x200/?face&crop=face&v={{$i}}" alt="avatar"
                         class="w-14 h-14 rounded-xl">
                </a>
                <div class="mx-4">
                    <h4  class="text-xl font-semibold">
                        <a href="#" class="hover:underline">A random title can go here</a>
                    </h4>
                    <div class="text-gray-600 mt-3 line-clamp-3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid laboriosam laborum qui saepe. Ab architecto consectetur dicta doloremque expedita modi praesentium sint totam. A cupiditate eaque eos facere fuga id, itaque numquam officia quidem, quos reiciendis, sunt temporibus ullam veritatis voluptatibus. Accusantium amet, cumque cupiditate delectus doloribus dolorum eveniet excepturi expedita, facilis ipsam libero maxime nihil nulla numquam pariatur perspiciatis, quibusdam quidem voluptatibus! Accusantium cupiditate distinctio dolore, earum et eveniet ipsa modi quam soluta veniam voluptate voluptatibus. Adipisci aliquid blanditiis consequuntur delectus dicta eius eos eveniet hic labore minima nostrum odio provident quidem quis, sed totam veniam. Deserunt dignissimos ex illo inventore iusto recusandae similique sint sunt tempora. Aliquid animi commodi consequuntur, delectus dolore et expedita hic illo ipsam iste labore, laborum magnam magni maxime minus nihil numquam odit officiis omnis quae quas quia quibusdam quisquam quos recusandae reiciendis repellat soluta suscipit ullam vero? Ad aliquid animi architecto aspernatur, consequatur dicta doloremque dolores doloribus, dolorum esse exercitationem fugit inventore ipsa laboriosam libero minima quas quis ratione recusandae saepe similique sint sit soluta temporibus tenetur vel veniam. Atque dicta distinctio dolor dolore dolorum eos exercitationem expedita facere hic illum incidunt iure iusto laudantium magnam minima modi molestiae nulla obcaecati omnis pariatur praesentium provident quae quaerat quasi quidem quos, rem totam unde vel voluptate. Accusantium adipisci amet architecto aspernatur blanditiis cum cumque delectus dolorem doloribus earum error et facilis harum id illo illum in ipsa ipsum, laborum minima modi natus necessitatibus nobis numquam officiis omnis porro quaerat repellat sed sint soluta tempore unde, veritatis voluptas voluptate voluptatem voluptates. Ab debitis enim facilis fuga harum, ipsum, itaque necessitatibus nobis non possimus praesentium quibusdam quo repellat rerum sapiente sequi, tenetur voluptatibus. A adipisci architecto deserunt dicta dignissimos ea enim illo illum ipsa odit pariatur quam reiciendis rem reprehenderit, sequi, soluta ut, voluptas voluptates voluptatum!
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <div class="flex items-center text-xs font-semibold space-x-2 text-gray-400">
                            <div>10 hours ago</div>
                            <div>&bull;</div>
                            <div>Category 1</div>
                            <div>&bull;</div>
                            <div class="text-gray-900">3 Comments</div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full
                            text-center w-28 h-7 py-2 px-4">
                                Open
                            </div>
                            <button class="relative bg-gray-100 hover:bg-gray-200 rounded-full h-7 transition duration-150
                            ease-in py-2 px-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                <ul class="absolute w-44 font-semibold bg-white shadow-lg rounded-xl py-3 ml-8">
                                    <li>
                                        <a href="" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">
                                            Mark as Spam
                                        </a>
                                        <a href="" class="hover:bg-gray-100 px-5 py-3 block transition duration-150 ease-in">
                                            Delete Post
                                        </a>
                                    </li>
                                </ul>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor

    </div>
</x-app-layout>
