@if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
    <br/>
@endif

@if(session('error'))
    <div class="text-danger">
        {{ session('error') }}
    </div>
    <br/>
@endif

<form action="{{ route('subscribeNewsletter') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="emailRecipient">@lang('email.form.label')</label>
    <input type="email" name="emailRecipient" id="emailRecipient" placeholder="@lang('email.form.placeholder')">
    <button type="submit">@lang('actions.send')</button>
</form>