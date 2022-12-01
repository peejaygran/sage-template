<div class="faq-accordion">
    @php

    $faq = get_fields();
    @endphp

    @foreach ($faq['faq-items'] as $item)
        <div class="accordion-item">
            <button class="accordion-button" aria-expanded="false">
                <span class="accordion-title">{{ $item['question'] }}</span>
                <span class="icon" aria-hidden="true"></span>
            </button>
            <div class="accordion-content">
                <p>{{ $item['answer'] }}</p>
            </div>
        </div>
    @endforeach

</div>


<style>
    .faq-accordion .accordion-item {
        border-bottom: 1px solid #eee;
    }

    .faq-accordion button[aria-expanded='true'] {
        border-bottom: 1px solid #e32f0f;
    }

    .faq-accordion button {
        position: relative;
        display: block;
        text-align: left;
        width: 100%;
        padding: 1em 0;
        color: #126b6e;
        font-size: 1.15rem;
        font-weight: 400;
        border: none;
        background: none;
        outline: none;
    }

    .faq-accordion button:hover,
    .faq-accordion button:focus {
        cursor: pointer;
        color: #e32f0f;
    }

    .faq-accordion button:hover::after,
    .faq-accordion button:focus::after {
        cursor: pointer;
        color: #e32f0f;
        border: 1px solid #e32f0f;
    }

    .faq-accordion .accordion-title {
        padding: 1em 1.5em 1em 0;
    }

    .faq-accordion .icon {
        display: inline-block;
        position: absolute;
        top: 18px;
        right: 0;
        width: 22px;
        height: 22px;
        border: 1px solid;
        border-radius: 22px;
    }

    .faq-accordion .icon::before {
        display: block;
        position: absolute;
        content: '';
        top: 9px;
        left: 5px;
        width: 10px;
        height: 2px;
        background: currentColor;
    }

    .faq-accordion .icon::after {
        display: block;
        position: absolute;
        content: '';
        top: 5px;
        left: 9px;
        width: 2px;
        height: 10px;
        background: currentColor;
    }

    .faq-accordion button[aria-expanded='true'] {
        color: #e32f0f;
    }

    .faq-accordion button[aria-expanded='true'] .icon::after {
        width: 0;
    }

    .faq-accordion button[aria-expanded='true']+.accordion-content {
        opacity: 1;
        max-height: 9em;
        transition: all 200ms linear;
        will-change: opacity, max-height;
    }

    .faq-accordion .accordion-content {
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transition: opacity 200ms linear, max-height 200ms linear;
        will-change: opacity, max-height;
    }

    .faq-accordion .accordion-content p {
        font-size: 1rem;
        font-weight: 300;
        margin: 2em 0;
    }

</style>

<script>
    const items = document.querySelectorAll(".faq-accordion button");

    function toggleAccordion() {
        const itemToggle = this.getAttribute('aria-expanded');

        for (i = 0; i < items.length; i++) {
            items[i].setAttribute('aria-expanded', 'false');
        }

        if (itemToggle == 'false') {
            this.setAttribute('aria-expanded', 'true');
        }
    }

    items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>
