@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="row justify-content-center w-100">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="mb-0">File a Complaint</h2>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('complaint.store') }}" method="POST">
                        @csrf
                        <div class="mb-4 text-center">
                            <x-form-label for="email" class="fw-bold">Email Address</x-form-label>
                            <div class="mt-2">
                            <x-form-input 
                                type="email" 
                                name="email" 
                                id="email" 
                                class="rounded-pill shadow-sm p-3 w-75 mx-auto" 
                                placeholder="Enter your email" 
                                required />
                            </div>
                        </div>
                        <div class="mb-4 text-center">
                            <x-form-label for="complaint" class="fw-bold">Your Complaint</x-form-label>
                            <div class="mt-2">
                            <textarea 
                                name="complaint" 
                                id="complaint" 
                                rows="5" 
                                class="form-control shadow-sm p-3 w-75 mx-auto custom-textarea" 
                                placeholder="Write your complaint here..." 
                                required></textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg px-5 rounded-pill shadow-sm">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
