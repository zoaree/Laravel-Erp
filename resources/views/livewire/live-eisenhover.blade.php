   <div>
       <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-6">
           <div class="card bg-red-200" wire:click="filterByColor(1)" style="cursor: pointer;">
               <div class="p-5">
                   <div class="flex justify-between">
                       <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-red-100"
                           title="Geçiken veya anlık gelen işler." tabindex="0" data-plugin="tippy"
                           data-tippy-followcursor="true" data-tippy-arrow="true" data-tippy-animation="fade">
                           <i class="mgc_information_line text-4xl text-red-500"></i>
                       </div>
                       <div class="text-right">
                           <h3 class="text-red-600 mt-1 text-2xl font-bold mb-5 dark:red-gray-300">{{ $kirmizi }}
                           </h3>
                           <p class="text-red-500 mb-1 truncate dark:text-red-400">Toplam</p>
                       </div>
                   </div>
               </div>
           </div>

           <div class="card bg-orange-200" wire:click="filterByColor(2)" style="cursor: pointer;">
               <div class="p-5">
                   <div class="flex justify-between">
                       <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-orange-100"
                           title="Sürekli devamlılığı olan kısım kısım yapılan işler." tabindex="0"
                           data-plugin="tippy" data-tippy-followcursor="true" data-tippy-arrow="true"
                           data-tippy-animation="fade">
                           <i class="mgc_information_line text-4xl text-orange-500"></i>
                       </div>
                       <div class="text-right">
                           <h3 class="text-orange-600 mt-1 text-2xl font-bold mb-5 dark:text-gray-300">
                               {{ $turuncu }}</h3>
                           <p class="text-orange-500 mb-1 truncate dark:text-gray-400">Toplam</p>
                       </div>
                   </div>
               </div>
           </div>

           <div class="card bg-yellow-200" wire:click="filterByColor(3)" style="cursor: pointer;">
               <div class="p-5">
                   <div class="flex justify-between">
                       <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-yellow-100"
                           title="Şirket içerisinden veya dışarıdan alınan hizmetler." tabindex="0"
                           data-plugin="tippy" data-tippy-followcursor="true" data-tippy-arrow="true"
                           data-tippy-animation="fade">
                           <i class="mgc_information_line text-4xl text-yellow-500"></i>
                       </div>
                       <div class="text-right">
                           <h3 class="text-yellow-600 mt-1 text-2xl font-bold mb-5 dark:text-gray-300">
                               {{ $sari }}</h3>
                           <p class="text-yellow-500 mb-1 truncate dark:text-gray-400">Toplam</p>
                       </div>
                   </div>
               </div>
           </div>

           <div class="card bg-green-200" wire:click="filterByColor(4)" style="cursor: pointer;">
               <div class="p-5">
                   <div class="flex justify-between">
                       <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-green-100"
                           title="İleri tarihli işler." tabindex="0" data-plugin="tippy"
                           data-tippy-followcursor="true" data-tippy-arrow="true" data-tippy-animation="fade">
                           <i class="mgc_information_line text-4xl text-green-500"></i>
                       </div>
                       <div class="text-right">
                           <h3 class="text-green-600 mt-1 text-2xl font-bold mb-5 dark:text-gray-300">
                               {{ $yesil }}</h3>
                           <p class="text-green-500 mb-1 truncate dark:text-gray-400">Toplam</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>

       <div class="mt-6">
           <div class="card">
               <div class="flex flex-wrap justify-between items-center gap-2 p-6">
                   <div class="flex flex-wrap gap-2">
                       <a href="javascript:void(0);"
                           class="btn bg-info/25 text-sm font-medium text-info hover:text-white hover:bg-info">
                           <i class="mgc_add_circle_line me-3"></i>
                           Görev Ekle</a>
                       <select id="search-select" class="search-select">
                           <option value="orange" selected>Orange</option>
                           <option value="White">White</option>
                           <option value="Purple">Purple</option>
                       </select>
                   </div>
                   <div class="flex flex-wrap gap-2">

                       <button
                           class="btn bg-success/25 text-sm font-medium text-success hover:text-white hover:bg-success"
                           wire:click="filterByColor('clear')">
                           Tümünü Göster</button>
                       <button type="button"
                           class="btn bg-dark/25 text-sm font-medium text-slate-900 dark:text-slate-200/70 hover:text-white hover:bg-dark/90">Dışarı
                           Aktar</button>
                   </div>
               </div>


               <div class="relative overflow-x-auto">
                   <table class="w-full divide-y divide-gray-300 dark:divide-gray-700">
                       <thead
                           class="bg-slate-300 bg-opacity-20 border-t dark:bg-slate-800 divide-gray-300 dark:border-gray-700">
                           <tr>
                               <th scope="col"
                                   class="py-3.5 ps-4 pe-3 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                   Sıra No
                               </th>

                               <th scope="col"
                                   class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                   Kişi
                               </th>
                               <th scope="col"
                                   class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                   Yapılan İş
                               </th>
                               <th scope="col"
                                   class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                   Açıklama
                               </th>
                               <th scope="col"
                                   class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                   Renk
                               </th>
                               <th scope="col"
                                   class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                   Durum</th>
                               <th scope="col"
                                   class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                   Başlangış
                                   Tar.</th>
                               <th scope="col"
                                   class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200">
                                   Bitiş Tar.
                               </th>
                               <th scope="col"
                                   class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900 dark:text-gray-200">
                                   İşlemler
                               </th>
                           </tr>
                       </thead>
                       <tbody class="divide-y divide-gray-200 dark:divide-gray-700 ">
                           @php
                               $sira = 1;
                           @endphp
                           @foreach ($eisenhowers as $item)
                               @php
                                   $statusStyles = [
                                       0 => [
                                           'text' => 'Açık',
                                           'bg' => 'bg-success/80',
                                           'textColor' => 'text-white',
                                           'lineThrough' => '',
                                       ],
                                       1 => [
                                           'text' => 'Kapalı',
                                           'bg' => 'bg-dark/80',
                                           'textColor' => 'text-white',
                                           'lineThrough' => 'line-through',
                                       ],
                                   ];
                               @endphp
                               <tr>
                                   <td
                                       class="whitespace-nowrap py-4 ps-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200 {{ $statusStyles[$item->status]['lineThrough'] }}">
                                       <b>{{ $sira++ }}</b>
                                   </td>
                                   <td
                                       class="whitespace-nowrap py-4 pe-3 text-sm {{ $statusStyles[$item->status]['lineThrough'] }}">
                                       <div class="flex items-center">
                                           <div class="h-10 w-10 flex-shrink-0">
                                               @if (auth()->user()->user_image)
                                                   <img class="w-10 h-10 rounded-full object-cover"
                                                       src="{{ asset('storage/' . auth()->user()->user_image) }}"
                                                       alt="Profile Picture">
                                               @else
                                                   <div
                                                       class="w-10 h-10 justify-center items-center flex bg-success/25 rounded-full">
                                                       <span class="text-success text-xl"></span>
                                                   </div>
                                               @endif
                                           </div>
                                           <div class="font-medium text-gray-900 dark:text-gray-200 ms-4">
                                               {{ $item->user->name }}
                                           </div>
                                       </div>
                                   </td>
                                   <td
                                       class="whitespace-nowrap py-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200 {{ $statusStyles[$item->status]['lineThrough'] }}">
                                       {{ $item->todo }}</td>
                                   <td
                                       class="whitespace-nowrap py-4 px-3 text-sm {{ $statusStyles[$item->status]['lineThrough'] }}">
                                       {{ $item->comment }}
                                   </td>
                                   @php
                                       $colors = [
                                           1 => ['name' => 'Kırmızı', 'bg' => 'bg-red-200', 'text' => 'text-red-600'],
                                           2 => [
                                               'name' => 'Turuncu',
                                               'bg' => 'bg-orange-200',
                                               'text' => 'text-orange-600',
                                           ],
                                           3 => [
                                               'name' => 'Sarı',
                                               'bg' => 'bg-yellow-200',
                                               'text' => 'text-yellow-600',
                                           ],
                                           4 => ['name' => 'Yeşil', 'bg' => 'bg-green-200', 'text' => 'text-green-600'],
                                       ];
                                   @endphp

                                   <td
                                       class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 {{ $statusStyles[$item->status]['lineThrough'] }}">
                                       <div
                                           class="inline-flex items-center gap-1.5 py-1 px-3 rounded text-xs font-medium {{ $colors[$item->color]['bg'] }} {{ $colors[$item->color]['text'] }}">
                                           {{ $colors[$item->color]['name'] }}
                                       </div>
                                   </td>
                                   <td
                                       class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 {{ $statusStyles[$item->status]['lineThrough'] }}">
                                       <div
                                           class="inline-flex items-center gap-1.5 py-1 px-3 rounded text-xs font-medium {{ $statusStyles[$item->status]['bg'] }} {{ $statusStyles[$item->status]['textColor'] }} ">
                                           {{ $statusStyles[$item->status]['text'] }}
                                       </div>
                                   </td>
                                   <td
                                       class="whitespace-nowrap py-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200 {{ $statusStyles[$item->status]['lineThrough'] }}">
                                       {{ $item->created_at->format('d/m/Y') }}</td>
                                   <td
                                       class="whitespace-nowrap py-4 pe-3 text-sm font-medium text-gray-900 dark:text-gray-200 {{ $statusStyles[$item->status]['lineThrough'] }}">
                                       {{ $item->endDate->format('d/m/Y') }}</td>
                                   <td class="whitespace-nowrap py-4 px-3 text-center text-sm font-medium ">
                                       <a href="javascript:void(0);" class="me-0.5">
                                           <i class="mgc_edit_line text-lg"></i>
                                       </a>
                                       <a href="javascript:void(0);" class="ms-0.5">
                                           <i class="mgc_delete_line text-xl"></i>
                                       </a>
                                   </td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>
