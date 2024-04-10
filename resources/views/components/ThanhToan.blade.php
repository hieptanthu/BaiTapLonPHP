<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('ThanhToan') }}" method="POST">
                @csrf @method('POST')
                <div class="form-group">
                    <label for="fullname">full Name</label>
                    <input type="text" class="form-control" name="fullname">
                </div>
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label name="phone_number" for="phone_number">Phone Nunber:</label>
                    <input type="nunber" class="form-control" name="phone_number">
                </div>
                <div class="form-group">
                    <label for="address">AddRess:</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    <input type="text" class="form-control" name="note">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
