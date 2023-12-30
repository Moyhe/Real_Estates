                   <!-- Modal -->
                   @foreach ($estates as $estate)

                   <div x-data="{ input: '{{ env('APP_URL') . $estate->slug}}' , showMsg: false}" class="modal fade" id="exampleModal{{$estate->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"> Share On Social Media</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body  d-flex justify-content-center">

                           <a type="button" @click="navigator.clipboard.writeText(input), showMsg = true, setTimeout(() => showMsg = false, 1000)">
                            <button  class="btn mt-1 px-3 text-white"  type="button" style="background-color: #2c3e50; ">
                                <i class="fa-regular fa-clone"></i>
                            </button>
                            <div class=""  x-show="showMsg" @click.away="showMsg = false">
                                Copied
                             </div>

                           </a>

                           <span>
                            {!! Share::page($estate->slug, $estate->title, ['class' => 'text-white', 'target' => '_blank'])->telegram()->whatsapp() !!}
                           </span>
                        </div>

                        </div>
                    </div>
                </div>
                @endforeach


