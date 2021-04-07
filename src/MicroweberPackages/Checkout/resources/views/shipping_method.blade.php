@extends('checkout::layout')

@section('content')

    <form method="post" action="{{ route('checkout.shipping_method_save') }}">

        <a href="{{ route('checkout.contact_information') }}" class="btn btn-outline-primary"><i class="mdi mdi-arrow-left"></i> {{ _e('Back') }}</a>

        <div class="shop-cart" style="margin-top:25px;">

            <div class="card" style="margin-bottom:15px;">
                <div class="card-body d-flex p-3">

                    <div class="col-6">
                        <?php if (!empty($checkout_session['first_name'])) echo $checkout_session['first_name']; ?>
                        <?php if (!empty($checkout_session['last_name'])) echo $checkout_session['last_name']; ?>
                        <br/>
                        <?php if (!empty($checkout_session['phone'])) echo $checkout_session['phone']; ?>
                        <br />
                        <?php if (!empty($checkout_session['email'])) echo $checkout_session['email']; ?>
                        <br />
                    </div>

                   <div class="col-6 justify-content-end text-right align-self-top px-0">
                       <a href="{{ route('checkout.contact_information') }}" class="btn btn-link text-right">{{ _e('Edit') }}</a>
                   </div>

                </div>
            </div>

            <div class="shop-cart-shipping" style="margin-bottom:20px;">
                 <module type="shop/shipping" template="checkout_v2" data-store-values="true" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">{{ _e('Continue') }}</button>
    </form>



@endsection