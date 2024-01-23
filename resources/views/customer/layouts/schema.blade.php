<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "{!! $setting->title !!}",
        "@id": "{{ url()->current() }}",
        "url": "{{ url()->current() }}",
        "logo": "{{asset($setting->logo)}}",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "{!! $setting->tel !!}",
            "email": "{!! $setting->email !!}",
            "contactType": "customer service",
            "areaServed": "IR",
            "availableLanguage": "Persian"
        },
        "sameAs": [
            "{!! $setting->instagram !!}",
            "{!! $setting->twitter !!}"
            "{!! $setting->telegram !!}"
            "{!! $setting->google_plus !!}"
            "{!! $setting->instagram !!}"
        ]
    }, {
        "@type": "PostalAddress",
        "@id": "{{ url()->current() }}",
        "streetAddress": "Mazandaran Province, Sari, Bolvar Sardar Solaymani, Digikala Office",
        "addressLocality": "Mazandaran",
        "postalCode": "1314653348",
        "addressRegion": "Mazandaran Province",
        "addressCountry": "IR"
    },
</script>