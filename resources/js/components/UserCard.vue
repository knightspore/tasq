<template>
    <div class="w-full lg:max-w-lg max-h-24 bg-white flex flex-row shadow-md m-auto">
        <div class="w-1 bg-gray-700"></div>
        <div class="px-5 py-6 flex gap-5">
            <div class="image w-24 h-24 flex bg-gray-200 rounded-full">
                <img class="m-auto rounded-full shadow-sm" :src="avatar" alt="">
            </div>

            <div class="info flex flex-col justify-between">
                <div>
                    <h3 class="font-bold"><a class="text-3xl text-gray-700">{{name}}</a></h3>
                    <p class="text-xs text-gray-500 font-bold uppercase">{{role}}</p>
                </div>
                
                <div class="icons flex gap-2">
                    <div class="h-6 text-gray-500 hover:text-gray-700">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="user-circle w-6 h-6"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="h-6 text-gray-500 hover:text-gray-700">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="globe-alt w-6 h-6"><path fill-rule="evenodd" d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="h-6 text-gray-500 hover:text-gray-700">
                        <svg viewBox="0 0 20 20" fill="currentColor" class="mail w-6 h-6"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                    </div>
                </div>
            </div>
        </div>
  </div>
</template>

<script>
export default {
    name: 'UserCard',
    props: [
        'name',
        'role',
        'avatar'
    ]
}
</script>