<?php

// Edition-level settings shared with every page. Values with 'confirmed' => false are placeholders
// and are labelled as such in the UI until replaced with verified information (later via the CMS).

return [

    'edition' => [
        'year' => 2027,
        'name' => 'Freelancer Summit Bangladesh',
        'tagline' => "Empowering Bangladesh's Next-Gen Digital Workforce & AI Pioneers",
        'organizers' => ['BACCO', 'DoICT'],
    ],

    'grand_summit' => [
        'start' => '2027-02-20T09:00:00+06:00',
        'end' => '2027-02-21T18:00:00+06:00',
        'date_label' => '20–21 Feb 2027',
        'venue' => 'Venue TBA',
        'city' => 'Dhaka',
        'confirmed' => false,
    ],

    'contact' => [
        'email' => 'info@example.org',
        'phone' => '+880 0000-000000',
        'address' => 'Dhaka, Bangladesh',
        'confirmed' => false,
    ],

    'social' => [
        ['name' => 'Facebook', 'href' => '#'],
        ['name' => 'LinkedIn', 'href' => '#'],
        ['name' => 'YouTube', 'href' => '#'],
        ['name' => 'X', 'href' => '#'],
        ['name' => 'Instagram', 'href' => '#'],
    ],

    'ctas' => [
        'register' => ['label' => 'Register Now', 'href' => '/register'],
        'nominate' => ['label' => 'Nominate for Awards', 'href' => '/awards/nominate'],
        'sponsor' => ['label' => 'Become a Sponsor', 'href' => '/sponsorship-opportunity'],
        'exhibit' => ['label' => 'Exhibit Now', 'href' => '/exhibition/apply'],
        'forum' => ['label' => 'Join the Forum', 'href' => '/forum/register'],
    ],

    'nav' => [
        ['label' => 'Summit', 'children' => [
            ['label' => 'About the Summit', 'href' => '/about', 'desc' => 'Vision, objectives and organizers'],
            ['label' => 'Grand Dhaka Summit', 'href' => '/grand-summit', 'desc' => 'The two-day flagship conference'],
            ['label' => 'Agenda', 'href' => '/agenda', 'desc' => 'Multi-track sessions & workshops'],
            ['label' => 'Speakers', 'href' => '/speakers', 'desc' => 'Global and local voices'],
        ]],
        ['label' => 'National Journey', 'children' => [
            ['label' => 'Journey Overview', 'href' => '/national-journey', 'desc' => 'The nationwide campaign map'],
            ['label' => 'Divisional Summits', 'href' => '/divisional-summits', 'desc' => '8 divisions across Bangladesh'],
            ['label' => 'District Roadshows', 'href' => '/district-roadshows', 'desc' => '12 district-level roadshows'],
            ['label' => 'Campus Programs', 'href' => '/campus-programs', 'desc' => '100 universities & colleges'],
        ]],
        ['label' => 'Awards', 'children' => [
            ['label' => 'Freelancer Awards', 'href' => '/awards', 'desc' => 'Celebrating digital excellence'],
            ['label' => 'Award Categories', 'href' => '/awards/categories', 'desc' => 'Criteria and eligibility'],
            ['label' => 'Submit Nomination', 'href' => '/awards/nominate', 'desc' => 'Multi-step nomination'],
        ]],
        ['label' => 'Partner', 'children' => [
            ['label' => 'Sponsors', 'href' => '/sponsors', 'desc' => 'Our supporting partners'],
            ['label' => 'Sponsorship Opportunity', 'href' => '/sponsorship-opportunity', 'desc' => 'Packages & prospectus'],
            ['label' => 'Exhibition', 'href' => '/exhibition', 'desc' => 'Exhibitors and floorplan'],
            ['label' => 'Partners', 'href' => '/partners', 'desc' => 'Institutional partners'],
        ]],
        ['label' => 'Forum', 'href' => '/forum'],
        ['label' => 'Media', 'children' => [
            ['label' => 'News', 'href' => '/news', 'desc' => 'Announcements & press'],
            ['label' => 'Success Stories', 'href' => '/success-stories', 'desc' => 'Freelancers who made it'],
            ['label' => 'Media Gallery', 'href' => '/media', 'desc' => 'Photos, videos & media kit'],
        ]],
    ],

    'footer' => [
        ['title' => 'Summit', 'links' => [
            ['label' => 'About', 'href' => '/about'],
            ['label' => 'Grand Summit', 'href' => '/grand-summit'],
            ['label' => 'Agenda', 'href' => '/agenda'],
            ['label' => 'Speakers', 'href' => '/speakers'],
            ['label' => 'National Journey', 'href' => '/national-journey'],
        ]],
        ['title' => 'Participate', 'links' => [
            ['label' => 'Register', 'href' => '/register'],
            ['label' => 'Nominate for Awards', 'href' => '/awards/nominate'],
            ['label' => 'Book Exhibition Booth', 'href' => '/exhibition/apply'],
            ['label' => 'Join BACCO Forum', 'href' => '/forum/register'],
            ['label' => 'Sponsorship', 'href' => '/sponsorship-opportunity'],
        ]],
        ['title' => 'Resources', 'links' => [
            ['label' => 'News', 'href' => '/news'],
            ['label' => 'Success Stories', 'href' => '/success-stories'],
            ['label' => 'Media Gallery', 'href' => '/media'],
            ['label' => 'Partners', 'href' => '/partners'],
            ['label' => 'Contact', 'href' => '/contact'],
        ]],
    ],

    // Public routes whose full modules ship in later phases; each renders the shared "Planned" page.
    'planned_pages' => [
        '/about' => ['title' => 'About the Summit', 'eyebrow' => 'Summit', 'desc' => 'Vision, strategic objectives and the organisers behind Freelancer Summit Bangladesh.'],
        '/national-journey' => ['title' => 'National Journey', 'eyebrow' => 'Campaign', 'desc' => 'Interactive dashboard of divisional summits, district roadshows and campus programmes.'],
        '/divisional-summits' => ['title' => 'Divisional Summits', 'eyebrow' => 'Campaign', 'desc' => 'Summits across all 8 divisions of Bangladesh.'],
        '/district-roadshows' => ['title' => 'District Roadshows', 'eyebrow' => 'Campaign', 'desc' => '12 district roadshows bringing opportunities closer to local talent.'],
        '/campus-programs' => ['title' => 'Campus Programs', 'eyebrow' => 'Campaign', 'desc' => 'AI and freelancing programmes at 100 campuses.'],
        '/grand-summit' => ['title' => 'Grand Dhaka Summit', 'eyebrow' => 'Summit', 'desc' => 'Venue, schedule, brochure and announcements for the flagship summit.'],
        '/agenda' => ['title' => 'Agenda', 'eyebrow' => 'Summit', 'desc' => 'Multi-day, multi-track programme filterable by date, room, track and session type.'],
        '/speakers' => ['title' => 'Speakers', 'eyebrow' => 'Summit', 'desc' => 'Searchable directory of speakers, mentors and panellists.'],
        '/speaker/{slug}' => ['title' => 'Speaker Profile', 'eyebrow' => 'Speakers', 'desc' => 'Biography, expertise and sessions.'],
        '/awards' => ['title' => 'Freelancer Awards', 'eyebrow' => 'Awards', 'desc' => 'Recognising outstanding digital professionals across Bangladesh.'],
        '/awards/categories' => ['title' => 'Award Categories', 'eyebrow' => 'Awards', 'desc' => 'Categories, criteria, eligibility and deadlines.'],
        '/awards/nominate' => ['title' => 'Submit a Nomination', 'eyebrow' => 'Awards', 'desc' => 'Multi-step nomination with portfolio and verification documents.', 'form' => true],
        '/sponsors' => ['title' => 'Sponsors', 'eyebrow' => 'Partner', 'desc' => 'The organisations supporting this edition.'],
        '/sponsorship-opportunity' => ['title' => 'Sponsorship Opportunity', 'eyebrow' => 'Partner', 'desc' => 'Title, Platinum, Gold, Silver and partner packages.', 'form' => true],
        '/exhibition' => ['title' => 'Exhibition', 'eyebrow' => 'Partner', 'desc' => 'Exhibitor directory and interactive booth floorplan.'],
        '/exhibition/apply' => ['title' => 'Apply for Exhibition', 'eyebrow' => 'Partner', 'desc' => 'Reserve a booth at the Grand Summit.', 'form' => true],
        '/forum' => ['title' => 'BACCO Freelancer Forum', 'eyebrow' => 'Community', 'desc' => 'A long-term professional community for Bangladesh’s freelancers.'],
        '/forum/register' => ['title' => 'Forum Membership', 'eyebrow' => 'Community', 'desc' => 'Register as a member of the BACCO Freelancer Forum.', 'form' => true],
        '/register' => ['title' => 'Summit Registration', 'eyebrow' => 'Attend', 'desc' => 'Register to attend and receive your QR e-ticket.', 'form' => true],
        '/success-stories' => ['title' => 'Success Stories', 'eyebrow' => 'Media', 'desc' => 'Freelancers who turned skills into thriving careers.'],
        '/news' => ['title' => 'News', 'eyebrow' => 'Media', 'desc' => 'Announcements, press releases and updates.'],
        '/news/{slug}' => ['title' => 'News Article', 'eyebrow' => 'News', 'desc' => 'Full article.'],
        '/media' => ['title' => 'Media Gallery', 'eyebrow' => 'Media', 'desc' => 'Photos, videos, press coverage and media kit.'],
        '/partners' => ['title' => 'Partners', 'eyebrow' => 'Partner', 'desc' => 'Institutional, academic and media partners.'],
        '/contact' => ['title' => 'Contact', 'eyebrow' => 'Get in touch', 'desc' => 'Reach the organising team.'],
        '/privacy-policy' => ['title' => 'Privacy Policy', 'eyebrow' => 'Legal', 'desc' => 'How we collect, use and protect personal data.'],
        '/terms' => ['title' => 'Terms of Use', 'eyebrow' => 'Legal', 'desc' => 'Terms governing use of this website and registrations.'],
    ],

];
