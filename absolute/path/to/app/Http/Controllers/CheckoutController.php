protected function validateCheckout(Request $request)
{
    $request->validate([
        'customer.first_name' => 'required',
        'customer.phone' => 'required|numeric|digits_between:9,12'
    ]);
}