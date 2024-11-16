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
                       <button 
                           class="btn bg-info/25 text-sm font-medium text-info hover:text-white hover:bg-info" @click="$dispatch('open-modal-add')">
                           <i class="mgc_add_circle_line me-3"></i>
                           Görev Ekle</button>
                  </div>


                  <div class="w-full h-full mt-5 fixed top-0 left-0 z-50 transition-all duration-500" 
                  x-data="{ open: false }" 
                  x-show="open"
                  @open-modal-add.window="open = true"
                  @modal-closed.window="open = false"
                  @keydown.escape.window="open = false"
                      style="display: none;">
                  <div class="fixed inset-0 bg-black bg-opacity-50"></div>
                  <div class="sm:max-w-2xl duration-500 relative mx-auto mt-20 bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
                      <div class="px-4 py-8 overflow-y-auto">
                          <div class="space-y-6">
                              <div class="text-left">
                                  <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Yapılan İş:</label>
                                  <input type="text" class="form-input w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800" id="todo">
                              </div>

                              <div class="text-left">
                                  <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Açıklama:</label>
                                  <textarea class="form-textarea w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800" rows="3" id="comment"></textarea>
                              </div>

                              <div class="text-left">
                                  <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Renk:</label>
                                  <select class="form-select w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800" id="color">
        
                                          <option value="1" >Kırmızı</option>
                                          <option value="2" >Turuncu</option>
                                          <option value="3" >Sarı</option>
                                          <option value="4" >Yeşil</option>

                                  </select>
                              </div>

                              <div class="text-left">
                                  <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Durum:</label>
                                  <select class="form-select w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800" id="status">
                                          <option value="0" >Açık</option>
                                          <option value="1" >Kapalı</option>
                                  </select>
                              </div>

                              <div class="text-left">
                                  <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Bitiş Tarihi:</label>
                                  <input type="date" class="form-input w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800" id="endDate">
                              </div>
                          </div>
                      </div>
                      <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                          <button class="btn dark:text-gray-200 border border-slate-200 dark:border-slate-700" 
                                  @click="open = false">
                              İptal
                          </button>
                          <button class="btn bg-success text-white" 
                                  wire:click="add({
                                      todo: document.getElementById('todo').value,
                                      comment: document.getElementById('comment').value,
                                      color: document.getElementById('color').value,
                                      status: document.getElementById('status').value,
                                      endDate: document.getElementById('endDate').value
                                  })">
                              Kaydet
                          </button>
                      </div>
                  </div>
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

               @if (session()->has('success'))
                   <div x-data="{ show: true }" 
                        x-show="show" 
                        x-init="setTimeout(() => show = false, 2000)"
                        class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 mx-6" 
                        role="alert">
                       <span class="block sm:inline">{{ session('success') }}</span>
                   </div>
               @endif

               @if (session()->has('error'))
                   <div x-data="{ show: true }" 
                        x-show="show"
                        x-init="setTimeout(() => show = false, 2000)"
                        class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 mx-6" 
                        role="alert">
                       <span class="block sm:inline">{{ session('error') }}</span>
                   </div>
               @endif
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
                                   Açklama
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
                                       <button class="me-0.5" @click="$dispatch('open-modal-{{ $item->id }}')">
                                           <i class="mgc_edit_line text-lg"></i>
                                       </button>


                                       <div class="w-full h-full mt-5 fixed top-0 left-0 z-50 transition-all duration-500" 
                                            x-data="{ open: false }" 
                                            x-show="open"
                                            @open-modal-{{ $item->id }}.window="open = true"
                                            @modal-closed.window="open = false"
                                            @keydown.escape.window="open = false"
                                                style="display: none;">
                                            <div class="fixed inset-0 bg-black bg-opacity-50"></div>
                                            <div class="sm:max-w-2xl duration-500 relative mx-auto mt-20 bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
                                                <div class="px-4 py-8 overflow-y-auto">
                                                    <div class="space-y-6">
                                                        <div class="text-left">
                                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Yapılan İş:</label>
                                                            <input type="text" value="{{ $item->todo }}" class="form-input w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800" id="todo-{{ $item->id }}">
                                                        </div>

                                                        <div class="text-left">
                                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Açıklama:</label>
                                                            <textarea class="form-textarea w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800" rows="3" id="comment-{{ $item->id }}">{{ $item->comment }}</textarea>
                                                        </div>

                                                        <div class="text-left">
                                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Renk:</label>
                                                            <select class="form-select w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800" id="color-{{ $item->id }}">
                                                                @foreach($colors as $key => $color)
                                                                    <option value="{{ $key }}" {{ $item->color == $key ? 'selected' : '' }}>{{ $color['name'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="text-left">
                                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Durum:</label>
                                                            <select class="form-select w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800" id="status-{{ $item->id }}">
                                                                @foreach($statusStyles as $key => $status)
                                                                    <option value="{{ $key }}" {{ $item->status == $key ? 'selected' : '' }}>{{ $status['text'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="text-left">
                                                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Bitiş Tarihi:</label>
                                                            <input type="date" value="{{ $item->endDate->format('Y-m-d') }}" class="form-input w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-800" id="endDate-{{ $item->id }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                                                    <button class="btn dark:text-gray-200 border border-slate-200 dark:border-slate-700" 
                                                            @click="open = false">
                                                        İptal
                                                    </button>
                                                    <button class="btn bg-success text-white" 
                                                            wire:click="edit({
                                                                id: {{ $item->id }},
                                                                todo: document.getElementById('todo-{{ $item->id }}').value,
                                                                comment: document.getElementById('comment-{{ $item->id }}').value,
                                                                color: document.getElementById('color-{{ $item->id }}').value,
                                                                status: document.getElementById('status-{{ $item->id }}').value,
                                                                endDate: document.getElementById('endDate-{{ $item->id }}').value
                                                            })">
                                                        Kaydet
                                                    </button>
                                                </div>
                                            </div>
                                        </div>


                                       <button wire:click="destroy({{ $item->id }})" id="sweetalert-success" >
                                           <i class="mgc_delete_line text-xl"></i>
                                       </button>

                         
                    
                                    
                                   </td>
                               </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>
