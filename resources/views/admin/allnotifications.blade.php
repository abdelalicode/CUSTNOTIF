<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tiny.cloud/1/hhtngc70t9omuzpceuwkenxf1rv4y68jxn7w97pzzbspsaws/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {

            font-family: "Poppins", sans-serif;
        }
    </style>
</head>



<body class="bg-gray-50">

    @include('admin.sidebar')

    <div class="pl-48 m-24">


        {{-- adding new notification modal (to move it to partials after) --}}
        <button data-modal-target="static-modal" data-modal-toggle="static-modal"
            class="float-right block text-white bg-sky-800 hover:bg-sky-900 focus:ring-0 focus:outline-none focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Add Notification
        </button>

        <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden  fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full  max-w-2xl max-h-full ">
                <div class="relative bg-white rounded-sm  shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between py-2 px-5  border-b rounded-t dark:border-gray-600">
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">
                            New Notification
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="static-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form action="{{ route('notification.store') }}" method="post">
                        @csrf
                        <div class="px-5 ">


                            <div class="flex gap-6">
                                <div class="mt-2">
                                    <label for="last_name"
                                        class="block mb-1 text-[11px] font-medium text-gray-900 dark:text-white">Name</label>
                                    <input name="name" type="text"
                                        class="bg-gray-50 text-xs border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Notification's name" required />
                                </div>

                                <div class="mt-2 grow">
                                    <label for="last_name"
                                        class="block mb-1 text-[11px] font-medium text-gray-900 dark:text-white">Description</label>
                                    <input name="description" type="text"
                                        class="bg-gray-50 text-xs border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Notification's description" required />
                                </div>

                                

                            </div>
                            <div class="mt-2">

                                <label for="categories"
                                    class="block mb-1 text-[11px] font-medium text-gray-900 dark:text-white">Select
                                    a
                                    category of templates to see what variables to use</label>
                                <select id="categories" name="email_template_category_id"
                                    class="bg-gray-50 text-xs border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected class="text-red-500">See available variables to use
                                    </option>
                                    @foreach ($categories as $category)
                                        <option value={{ $category->id }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                <div id="variables" class="flex flex-wrap pt-2">

                                </div>

                            </div>

                            <div class="mt-1 min-h-[402px]">


                                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                                    <ul class="flex flex-wrap -mb-px text-xs font-medium text-center"
                                        id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content"
                                        data-tabs-active-classes="text-sky-600 hover:text-sky-600 dark:text-sky-500 dark:hover:text-sky-500 border-sky-600 dark:border-sky-500"
                                        data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                        role="tablist">
                                        <li class="me-2" role="presentation">
                                            <button class="inline-block p-2 border-b-2 rounded-t-lg"
                                                id="profile-styled-tab" data-tabs-target="#styled-profile"
                                                type="button" role="tab" aria-controls="profile"
                                                aria-selected="false">Email</button>
                                        </li>
                                        <li class="me-2" role="presentation">
                                            <button
                                                class="inline-block p-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                                id="dashboard-styled-tab" data-tabs-target="#styled-dashboard"
                                                type="button" role="tab" aria-controls="dashboard"
                                                aria-selected="false">Push</button>
                                        </li>
                                    </ul>
                                </div>
                                <div id="default-styled-tab-content">
                                    <div class="hidden px-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="styled-profile"
                                        role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="email-template">

                           
                                            <div class="mt-2">
                                                <label for="subject"
                                                    class="block mb-2 text-[11px] font-medium text-gray-900 dark:text-white">Subject</label>
                                                <input type="text" name="subject"
                                                    class="bg-gray-50 text-xs border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Email's Subject" required />
                                            </div>



                                            <div class="mt-2">

                                                <label for="body"
                                                    class="block mb-2 text-[11px] font-medium text-gray-900 dark:text-white">Body</label>


                                                <script>
                                                    tinymce.init({
                                                        selector: 'textarea',
                                                        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
                                                        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                                        tinycomments_mode: 'embedded',
                                                        tinycomments_author: 'Author name',
                                                        mergetags_list: [{
                                                                value: 'First.Name',
                                                                title: 'First Name'
                                                            },
                                                            {
                                                                value: 'Email',
                                                                title: 'Email'
                                                            },
                                                        ],
                                                        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                                                            "See docs to implement AI Assistant")),
                                                    });
                                                </script>
                                                <div class="max-h-[260px] overflow-y-scroll text-[8px]">
                                                    <textarea name="body"  >
                                                        Put Your Template Here
                                                     </textarea>
                                                </div>
                                                

                                            </div>
                                        </div>
                                    </div>
                                    <div class="hidden min-h-[268px] p-4 rounded-lg bg-gray-50 dark:bg-gray-800"
                                        id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                        <div class="mt-2">
                                            <label for="title"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                                            <input name="title" type="text"
                                                class="bg-gray-50 text-xs border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Notification's name" required />
                                        </div>
                                        <div class="mt-2">
                                            <label for="content"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                                            <input name="content" type="text"
                                                class="bg-gray-50 text-xs border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Notification's name" required />
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>


                        <div
                            class="flex items-center px-4 py-2  md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="static-modal" type="submit"
                                class="text-white  bg-sky-800 hover:bg-sky-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create
                                Notification</button>
                            <button data-modal-hide="static-modal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="pt-12">

            <h2 class="text-md font-medium">YOUR NOTIFICATIONS</h2>

            <div class="relative mt-4 overflow-x-auto shadow-md shadow-gray-100 sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Send
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $notification)
                            <tr class="bg-white text-xs border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $notification->id }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $notification->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $notification->description }}
                                </td>
                                <td class="px-6 py-4">
                                    <button type="button"
                                        class="text-sky-600 bg-transparent hover:bg-gradient-to-br focus:ring-0 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 font-medium rounded-lg text-sm text-center flex items-center"><img
                                            width="24" height="24"
                                            src="https://img.icons8.com/ios-glyphs/30/228BE6/create-new.png"
                                            alt="create-new" />
                                        <p class="px-2">Edit</p>
                                    </button>

                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('notification.send', $notification->id) }}" method="POST">
                                        @csrf
                                        <button type="submit">
                                            <img width="24" height="24"
                                                src="https://img.icons8.com/color/48/appointment-reminders--v1.png"
                                                alt="appointment-reminders--v1" />
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>



    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectcat = document.getElementById('categories')

            selectcat.addEventListener('change', fetchData);

            function fetchData() {

                const selectedOption = selectcat.value;

                fetch(`/select?category=${selectedOption}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data)
                        variables.innerHTML = '';
                        data.forEach(variable => {
                            const html = `
                                                    <span class="bg-slate-200 text-slate-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-sky-900 dark:text-sky-300">
                                                        ${variable.value}
                                                    </span>
                                                          `;
                            variables.innerHTML += html;
                        });
                    });
            }
        })
    </script>
</body>

</html>
