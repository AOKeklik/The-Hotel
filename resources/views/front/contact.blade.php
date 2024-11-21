@extends("front.layout.app")
@section("title",$contact->contact_heading)
@section("heading",$contact->contact_heading)
@section("content")
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <p id="response" class="alert alert-success p-1 d-none"></p>
                <form action="" method="POST">
                    <div class="contact-form">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="">
                            <p class="text-danger error-text name_error"></p>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="text" class="form-control" name="email" value="">
                            <p class="text-danger error-text name_error"></p>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" rows="3" name="message"></textarea>
                            <p class="text-danger error-text name_error"></p>
                        </div>
                        <div class="mb-3">
                            <button type="button" onclick="handlerSubmitMailForm(event)" class="btn btn-primary bg-website">Send Message</button>
                            <img id="loading-gif" class="d-none" src="{{ asset("dist-front/img/loading.gif") }}" alt="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="map">
                    {!! $contact->contact_content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push("scripts")
    <script>
        async function handlerSubmitMailForm (e) {
            e.preventDefault()
            
            const form = e.target.closest("form")
            const name = form.querySelector("input[name=name]")
            const email = form.querySelector("input[name=email]")
            const message = form.querySelector("textarea[name=message]")
            
            const response = document.getElementById("response")
            const loadingGif = document.getElementById("loading-gif")

            loadingGif.classList.add("d-none")
            response.classList.add("d-none")
            ;[name,email,message].forEach(el => (el.nextElementSibling.textContent = ""))

            const error = []

            ;[name,email,message].forEach(el => {                
                if(el.name === "email" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(el.value.trim()))
                    error.push({"email": "Please provide a valid email address!"})

                if (el.value.trim() === "")
                    error.push({[el.name]: el.name[0].toUpperCase().concat(el.name.slice(1).toString()," field is required!")})
            })

            if (error.length !== 0) {
                error.forEach(err => { 
                    Object.keys(err).forEach(key => {
                        const input = document.querySelector(`[name=${key}]`)
                        
                        if (input) {
                            const errorMessage = input.nextElementSibling

                            if (errorMessage)
                                errorMessage.textContent = err[key]
                        }
                    })
                })
            }

            if (error.length === 0) {
                loadingGif.classList.remove("d-none")
                await new Promise(resolve => setTimeout(resolve, 1000))
                
                const formData = new FormData()
                formData.append("name", name.value.trim() || "")
                formData.append("email", email.value.trim() || "")
                formData.append("message", message.value.trim() || "") 
                formData.append("_token", "{{ csrf_token() }}")

                $.ajax({
                    url: "{{ route('front.contact.submit') }}",
                    type: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: data => {
                        ;[name,email,message].forEach(el => (el.value = ""))
                        response.textContent = data.message
                        response.classList.remove("d-none")
                        loadingGif.classList.add("d-none")
                        console.log("Success:", data)                        
                    },
                    error: err => {
                        // if (!err.responseJSON && !err.responseJSON.errors) return
                        console.error("Error", err);
                        // console.error("Error", err.responseJSON.errors);
                        // email.nextElementSibling.textContent = err.responseJSON.errors.email
                    }
                });
            }
        }
    </script>
@endpush