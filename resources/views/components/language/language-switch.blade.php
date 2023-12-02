<form action="{{ route('changeLang') }}" method="POST" class="d-inline-block">
    @csrf
    <select name="language" id="language" class="form-control" onchange="this.form.submit()">
        <option value="en" {{ session()->get('locale') === 'en' ? 'selected' : '' }}>English</option>
        <option value="fr" {{ session()->get('locale') === 'fr' ? 'selected' : '' }}>French</option>
    </select>
</form>