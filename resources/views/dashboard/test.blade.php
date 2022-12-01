<h1>test page </h1>


<script>
    let reviews = [{
            "customer_avatar": "MH",
            "customer_name": "Maria Hughes",
            "customer_link": "https://www.trustpilot.com/users/62c433790e5d210013d98ca6",
            "customer_review_rate": "5",
            "customer_review_date": "2022-07-05T14:50:16.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62c43388ba5bb6ef042c432b",
            "customer_review_title": "Competent home service",
            "customer_review_content": "Thanks to Sidepost's house painters, my property's value has shot up and I've gotten so many compliments from friends, family and neighbours. I managed to sell my house for way more than I was asking and I have Sidepost to thank for it. I honestly couldn’t be happier."
        },
        {
            "customer_avatar": "WC",
            "customer_name": "Wanda Clark",
            "customer_link": "https://www.trustpilot.com/users/62c41760d4f0e20014d7cd13",
            "customer_review_rate": "5",
            "customer_review_date": "2022-07-05T12:50:23.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62c4176eba5bb6ef042c20e4",
            "customer_review_title": "A home service company that actually cares",
            "customer_review_content": "Sidepost really do add a personal touch to their services. I've been using them for a few months and the staff always chat to me and my family. I get high-quality service is all about results, but it's the little things like this that make all the difference. Great job guys and keep it up!"
        },
        {
            "customer_avatar": "AM",
            "customer_name": "Adam Mitchell",
            "customer_link": "https://www.trustpilot.com/users/62c328265eb62f00121a8aed",
            "customer_review_rate": "5",
            "customer_review_date": "2022-07-04T19:49:41.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62c32835ba5bb6ef042b88e0",
            "customer_review_title": "Convenient lawn mowing that's also affordable",
            "customer_review_content": "I used to waste so much time mowing my lawn every week, and it did a number on my back. Ever sinde Sidepost's lawn mowing professionals entered the equation, I've been able to reclaim my weekends and my back doesn't hurt nearly as much. Highly recommend it!"
        },
        {
            "customer_avatar": "WR",
            "customer_name": "Warren Russell",
            "customer_link": "https://www.trustpilot.com/users/62c2deee5eb62f00121a4889",
            "customer_review_rate": "5",
            "customer_review_date": "2022-07-04T14:37:16.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62c2defcba5bb6ef042b2e06",
            "customer_review_title": "Thank you for accepting my last-minute request",
            "customer_review_content": "I had an upcoming house viewing and the bedrooms really needed a good paint job to freshen things up. Sidepost showed up the day after I booked and managed to finish in only two days. Needless to say, my buyers were very impressed with the results!"
        },
        {
            "customer_avatar": "RS",
            "customer_name": "Rachel Slater",
            "customer_link": "https://www.trustpilot.com/users/62c1f31993d40600137b7783",
            "customer_review_rate": "5",
            "customer_review_date": "2022-07-03T21:51:05.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62c1f329ba5bb6ef042a9e5e",
            "customer_review_title": "High quality house cleaning",
            "customer_review_content": "Sidepost's cleaners were on-time and took the extra time to listen to my specific instructions. The bedrooms and kitchen now resemble a show home and I honestly couldn't be happier. Besides all that, they’re also affordable, which is a massive bonus to the average person like myself."
        },
        {
            "customer_avatar": "AS",
            "customer_name": "Alison Skinner",
            "customer_link": "https://www.trustpilot.com/users/62bfdbb35eb62f001218a5b5",
            "customer_review_rate": "4",
            "customer_review_date": "2022-07-02T07:46:59.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62bfdbd3853b02c06c94ea86",
            "customer_review_title": "A great service all-around",
            "customer_review_content": "I've been meaning to find a home service company that can deliver numerous services, and Sidepost has been a great discovery. So far, I've used them for carpet cleaning, and house painting and the work has been flawless every time. They’re also pretty affordable, which is a huge selling point for all their other services I want to try."
        },
        {
            "customer_avatar": "JS",
            "customer_name": "Joanne Sanderson",
            "customer_link": "https://www.trustpilot.com/users/62bfd6975eb62f001218a48c",
            "customer_review_rate": "5",
            "customer_review_date": "2022-07-02T07:25:15.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62bfd6baba5bb6ef04294a6a",
            "customer_review_title": "I highly recommend Sidepost's services",
            "customer_review_content": "Sidepost's no-frills approach to home services is really refreshing. They don't try to upsell you on things and they're always upfront about pricing. I've used them for a few different things now and I haven't been disappointed yet. For Australian residents who really need help around the house, Sidepost is quickly becoming the company to call."
        },
        {
            "customer_avatar": "LB",
            "customer_name": "Lucas Bailey",
            "customer_link": "https://www.trustpilot.com/users/62beef965eb62f0012182bc4",
            "customer_review_rate": "5",
            "customer_review_date": "2022-07-01T14:59:21.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62beefa9853b02c06c944f1f",
            "customer_review_title": "Pest control service is thorough and effective",
            "customer_review_content": "We were starting to see more and more cockroaches in our kitchen, so we gave Sidepost's pest control service a try. Not only did they get rid of the cockroaches, but they also took preventive measures to make sure they didn't come back! Their pest control teams are clearly qualified."
        },
        {
            "customer_avatar": "AG",
            "customer_name": "Angela Gibson",
            "customer_link": "https://www.trustpilot.com/users/62bec45496481900130c39a6",
            "customer_review_rate": "5",
            "customer_review_date": "2022-07-01T11:54:43.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62bec463ba5bb6ef042880c5",
            "customer_review_title": "Reliable pool cleaning service",
            "customer_review_content": "Sidepost's pool cleaners show up like clockwork at the same time each week. They bring their equipment, and never fail to give my pool the deep clean it needs. I know it’s not the easiest job out there so I appreciate the hard work that goes into keeping my pool clean and sparkling!"
        },
        {
            "customer_avatar": "SW",
            "customer_name": "Sophie Wilkins",
            "customer_link": "https://www.trustpilot.com/users/62bd897812511f001486cbb7",
            "customer_review_rate": "5",
            "customer_review_date": "2022-06-30T13:31:25.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62bd898d853b02c06c93245e",
            "customer_review_title": "Sidepost's dry cleaning service is top-notch",
            "customer_review_content": "I have a demanding work schedule, so finding time to dry clean my clothes is often challenging. But with Sidepost's pick-up and delivery service, I have no more worries. The service is efficient, hassle-free and most importantly, my clothes are always returned stain-free!"
        },
        {
            "customer_avatar": "OS",
            "customer_name": "Owen Stevens",
            "customer_link": "https://www.trustpilot.com/users/62bcb631faa1890013c5d1ef",
            "customer_review_rate": "5",
            "customer_review_date": "2022-06-29T22:29:55.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62bcb643853b02c06c929f08",
            "customer_review_title": "Quick fence installation",
            "customer_review_content": "My last fence installation was a total disaster, so I didn't have high hopes for Sidepost. Thankfully I was wrong, and the fence was securely installed with no issues. The team was extremely efficient and very friendly, which made the process a lot more bearable."
        },
        {
            "customer_avatar": "DG",
            "customer_name": "David Green",
            "customer_link": "https://www.trustpilot.com/users/62bca310ebda3000131110f0",
            "customer_review_rate": "4",
            "customer_review_date": "2022-06-29T21:08:48.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62bca340853b02c06c928c94",
            "customer_review_title": "A life-saver during a busy time",
            "customer_review_content": "I live in a big household and peace is a rare commodity. But when the whole family's home and we're in dire need of a home clean, Sidepost is always there to save the day. Their cleaners are fast, friendly and meticulous in their cleaning approach. 5 out of 5!"
        },
        {
            "customer_avatar": "PP",
            "customer_name": "Penelope Paige",
            "customer_link": "https://www.trustpilot.com/users/62ba9ab05080550012d40bd7",
            "customer_review_rate": "5",
            "customer_review_date": "2022-06-28T08:09:28.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62ba9b18ba5bb6ef04251cb0",
            "customer_review_title": "Fantastic car wash service",
            "customer_review_content": "Going back and forth to get my car washed at the shop wasn't just a headache, it was time-consuming. Sidepost's mobile car service was an absolute game-changer. Not only did they come to my house, but they wasted no time in making my car sparkle. Great job!"
        },
        {
            "customer_avatar": "HS",
            "customer_name": "Harry Stewart",
            "customer_link": "https://www.trustpilot.com/users/62b9bcff45b4b60011d71524",
            "customer_review_rate": "5",
            "customer_review_date": "2022-06-27T16:22:11.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62b9bd13853b02c06c9003da",
            "customer_review_title": "A great, all-rounded service",
            "customer_review_content": "I've used Sidepost for a few different things, like getting my carpets cleaned and having my house painted. All I can say is that their contractors have a keen eye for detail and have a knack for choosing the right colours. The results have always been top-notch and I couldn't be happier."
        },
        {
            "customer_avatar": "LD",
            "customer_name": "Leah Davies",
            "customer_link": "https://www.trustpilot.com/users/62b9a0d13888b60012f8db0c",
            "customer_review_rate": "4",
            "customer_review_date": "2022-06-27T14:22:16.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62b9a0f8ba5bb6ef0424660d",
            "customer_review_title": "A very flexible and accommodating service",
            "customer_review_content": "I admit I haven't been the easiest customer, I've had to reschedule my appointments a few times now. But Sidepost has been very understanding and accommodating each time. They're always willing to work around my schedule, and deliver the goods when it comes to service quality."
        },
        {
            "customer_avatar": "LK",
            "customer_name": "Lisa Knox",
            "customer_link": "https://www.trustpilot.com/users/62b8056498ab1b00123c800f",
            "customer_review_rate": "5",
            "customer_review_date": "2022-06-26T09:07:29.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62b805b1853b02c06c8eccef",
            "customer_review_title": "The team was punctual and professional",
            "customer_review_content": "My lawn was exposed and I desperately needed a fence installed on-short notice. I'm happy to say Sidepost's fence installers really delivered, and then some. Not only did the team accommodate my last-minute request, but they went above and beyond to make sure my fence was installed perfectly."
        },
        {
            "customer_avatar": "JM",
            "customer_name": "Jack Martin",
            "customer_link": "https://www.trustpilot.com/users/62b7ea9b98ab1b00123c7a3f",
            "customer_review_rate": "5",
            "customer_review_date": "2022-06-26T07:12:11.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62b7eaabba5bb6ef042353f1",
            "customer_review_title": "The whole experience was great",
            "customer_review_content": "This is the first time I've used a house cleaning service and boy, was I missing out! The whole experience from start to finish was fantastic. My house was sparkling clean within a few hours and I couldn't have been happier. In fact, they're so good, I've now booked regular services!"
        },
        {
            "customer_avatar": "JL",
            "customer_name": "John Langdon",
            "customer_link": "https://www.trustpilot.com/users/62b6b6fa7a1f15001216cabc",
            "customer_review_rate": "4",
            "customer_review_date": "2022-06-25T09:19:38.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62b6b70a853b02c06c8e10e8",
            "customer_review_title": "My AC is now running better than ever!",
            "customer_review_content": "My air conditioner was leaking and my electricity bills were slowly but surely increasing. I found Sidepost's AC service and the technician thoroughly cleaned my AC and fixed the leaks. My AC is now firing on all cylinders and my bills have gone back to normal."
        },
        {
            "customer_avatar": "OB",
            "customer_name": "Oliver Berry",
            "customer_link": "https://www.trustpilot.com/users/62b579795e9ef00014f7b743",
            "customer_review_rate": "5",
            "customer_review_date": "2022-06-24T10:45:06.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62b57992ba5bb6ef0421c6e1",
            "customer_review_title": "I was so pleased with the service",
            "customer_review_content": "I had my carpets cleaned and I was so relieved to actually have competent professionals who did a bang-up job. The last cleaner actually did more harm than good, so Sidepost was really a god-send. I would highly recommend their services to anyone who needs a bit of extra help around the house."
        },
        {
            "customer_avatar": "EC",
            "customer_name": "Emily Carr",
            "customer_link": "https://www.trustpilot.com/users/62b5523c5a06620012e2e563",
            "customer_review_rate": "5",
            "customer_review_date": "2022-06-24T07:57:41.000Z",
            "customer_review_link": "https://www.trustpilot.com/reviews/62b55255853b02c06c8d0ed8",
            "customer_review_title": "Booking a service was smooth sailing",
            "customer_review_content": "Booking house painters on Sidepost's website was surprisingly efficient and straightforward. The service itself was also great, the painters thoroughly painted my kitchen cabinets with time to spare. Overall, it was smooth sailing and I couldn’t have asked for more!"
        }
    ]


    $.each(reviews, function(index, data) {
        $.ajax({
            type: "post",
            url: home_url('api/index.php/_reviews/save_tp_review'),
            data: data,
            success: function(response) {
                debugger;
            }
        });
    });

    alert('done');
</script>
