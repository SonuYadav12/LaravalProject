<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 font-poppins">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden flex w-full max-w-5xl border-4 border-gray-300">
            <div class="w-1/2 bg-cover bg-center" style="background-image: url('{{ asset('images/furniture.jpg') }}');"></div>
            <div class="w-1/2 p-12" x-data="registerForm()">
                <h2 class="text-4xl font-bold mb-8 text-gray-800">Join <span class=" text-green-400">FurniStyle</span></h2>

                <template x-if="successMessage">
                    <div x-show="successMessage" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <span class="block sm:inline" x-text="successMessage"></span>
                    </div>
                </template>

                <template x-if="errorMessages.length">
                    <div x-show="errorMessages.length" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                        <strong class="font-bold">Whoops!</strong>
                        <span class="block sm:inline">There were some problems with your input:</span>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            <template x-for="error in errorMessages" :key="error">
                                <li x-text="error"></li>
                            </template>
                        </ul>
                    </div>
                </template>

                <form @submit.prevent="submitForm">
                    @csrf
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                        <input type="text" name="name" x-model="formData.name" @input="clearMessages" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline transition duration-200 ease-in-out transform focus:scale-105">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                        <input type="email" name="email" x-model="formData.email" @input="clearMessages" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline transition duration-200 ease-in-out transform focus:scale-105">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                        <input type="password" name="password" x-model="formData.password" @input="clearMessages" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline transition duration-200 ease-in-out transform focus:scale-105">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" x-model="formData.password_confirmation" @input="clearMessages" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline transition duration-200 ease-in-out transform focus:scale-105">
                    </div>
                    <div class="mb-6">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded focus:outline-none focus:shadow-outline w-full transition duration-200 ease-in-out transform hover:scale-105">Register</button>
                    </div>
                </form>
                <p class="text-gray-600 text-sm mt-4">Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Login here</a>.</p>
            </div>
        </div>
    </div>

    <script>
        function registerForm() {
            return {
                formData: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
                successMessage: '',
                errorMessages: [],
                submitForm() {
                    fetch('http://127.0.0.1:8000/register', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(this.formData)
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.errors) {
                            this.errorMessages = Object.values(data.errors).flat();
                            this.successMessage = '';
                        } else if (data.success) {
                            this.successMessage = data.success;
                            this.errorMessages = [];
                            setTimeout(() => {
                                window.location.href = '{{ route('login') }}';
                            }, 2000);
                        } else if (data.error) {
                            this.errorMessages = [data.error];
                            this.successMessage = '';
                        }
                    })
                    .catch(error => {
                        this.errorMessages = ['An error occurred. Please try again.'];
                        this.successMessage = '';
                    });
                },
                clearMessages() {
                    this.successMessage = '';
                    this.errorMessages = [];
                }
            }
        }
    </script>
</body>
</html>
