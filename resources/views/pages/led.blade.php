@extends('layouts.dashboard')

@section('title_menu', 'Led Control')

@section('content')
    <div class="card">
        <h5 class="card-header">LED Control</h5>
        <div class="card-body">
            <h5 class="card-title">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    <i class="ri-add-line"></i> Tambah LED
                </button>
            </h5>
            <div class="row my-4">
                @foreach ($leds as $led)
                    <div class="col-sm-6 col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="align-items-start">
                                        <i class="fas fa-lightbulb fa-fw fa-4x @if ($led->status == '1') text-primary @endif"></i>
                                        <div>
                                            <h6 class="fw-bold">{{ $led->name }}</h6>
                                            <p class="text-muted">Pin: {{ $led->pin }}</p>
                                            <div class="form-check form-switch">
                                                <input @checked($led->status == '1') class="form-check-input led-toggle" type="checkbox" id="led-switch-{{ $led->id }}">
                                                <label class="form-check-label" for="led-switch-{{ $led->id }}"></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Edit</a></li>
                                            <li><a class="dropdown-item" href="#">Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('led.store') }}" method="POST">
                <div class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add LED</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">LED Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Nama LED">
                        </div>
                        <div class="form-group">
                            <label for="name">LED Pin</label>
                            <input type="number" class="form-control" name="pin" id="pin" placeholder="Pin">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .form-check-label {
            padding-left: 0;
            position: relative;
        }

        .form-check-label::before,
        .form-check-label::after {
            content: '';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 20px;
            border-radius: 25px;
            transition: 0.4s;
        }

        .form-check-label::before {
            left: 0;
            background-color: #adb5bd;
            border: 1px solid #adb5bd;
        }

        .form-check-input:checked + .form-check-label::before {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .form-check-input:checked + .form-check-label::after {
            left: calc(100% - 20px);
            background-color: #ffffff;
        }

        .form-check-input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .form-check-label::after {
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        }

    </style>
    <script>
        $(document).ready(function() {
            $('#addModal .btn-close, #addModal [data-bs-dismiss="modal"]').on('click', function() {
                $('#addModal').modal('hide');
            });

            $('input.led-toggle').on('change', function() {
                const value = $(this).prop('checked') ? 1 : 0;
                const id = $(this).attr('id').replace('led-switch-', '');

                if (value === 1) {
                    $(this).closest('.card').find('.fa-lightbulb').addClass('text-primary');
                } else {
                    $(this).closest('.card').find('.fa-lightbulb').removeClass('text-primary');
                }
            });

            $('#manual-switch').on('change', function() {
                const value = $(this).prop('checked') ? 1 : 0;
                if (value === 1) {
                    console.log('Manual switch is turned on. Turning on LED...');
                } else {
                    console.log('Manual switch is turned off. Turning off LED...');
                }
            });
        });
    </script>
@endsection
