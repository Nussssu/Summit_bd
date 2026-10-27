<?php

namespace App\Support;

/**
 * SAMPLE CONTENT — illustrative placeholders until the CMS and verified content are in place.
 * Nothing here represents confirmed speakers, sponsors, dates or figures.
 */
class SampleHomeContent
{
    public static function get(): array
    {
        return [
            'ticker' => [
                'Freelancer Summit Bangladesh 2027 national campaign announced',
                'Campus partnership applications opening soon',
                'Freelancer Awards 2027 categories under final review',
                'Sponsorship & exhibition enquiries now welcome',
                'BACCO Freelancer Forum membership launching with the campaign',
            ],

            'gallery' => [
                ['src' => '/images/stock/conference-audience.jpg', 'alt' => 'Summit audience'],
                ['src' => '/images/stock/workshop-team.jpg', 'alt' => 'Hands-on workshops'],
                ['src' => '/images/stock/keynote.jpg', 'alt' => 'Keynote sessions'],
                ['src' => '/images/stock/coworking.jpg', 'alt' => 'Freelancers at work'],
                ['src' => '/images/stock/panel.jpg', 'alt' => 'Panel discussions'],
                ['src' => '/images/stock/brainstorm.jpg', 'alt' => 'Campus bootcamps'],
                ['src' => '/images/stock/expo-crowd.jpg', 'alt' => 'Exhibition floor'],
                ['src' => '/images/stock/mentoring.jpg', 'alt' => 'One-to-one mentoring'],
                ['src' => '/images/stock/meetup-hall.jpg', 'alt' => 'Community meetups'],
                ['src' => '/images/stock/students.jpg', 'alt' => 'Student programmes'],
                ['src' => '/images/stock/workshop.jpg', 'alt' => 'Skills sessions'],
                ['src' => '/images/stock/networking.jpg', 'alt' => 'Networking evenings'],
            ],

            'stats' => [
                ['value' => 8, 'label' => 'Divisional Summits'],
                ['value' => 12, 'label' => 'District Roadshows'],
                ['value' => 100, 'label' => 'Campus Programs'],
                ['value' => 1, 'label' => 'Grand Dhaka Summit'],
            ],

            'divisions' => [
                ['slug' => 'rangpur', 'name' => 'Rangpur', 'lon' => 89.25, 'lat' => 25.75],
                ['slug' => 'rajshahi', 'name' => 'Rajshahi', 'lon' => 88.6, 'lat' => 24.37],
                ['slug' => 'mymensingh', 'name' => 'Mymensingh', 'lon' => 90.4, 'lat' => 24.75],
                ['slug' => 'sylhet', 'name' => 'Sylhet', 'lon' => 91.87, 'lat' => 24.9],
                ['slug' => 'dhaka', 'name' => 'Dhaka', 'lon' => 90.41, 'lat' => 23.81, 'grand' => true],
                ['slug' => 'khulna', 'name' => 'Khulna', 'lon' => 89.55, 'lat' => 22.85],
                ['slug' => 'barishal', 'name' => 'Barishal', 'lon' => 90.37, 'lat' => 22.7],
                ['slug' => 'chattogram', 'name' => 'Chattogram', 'lon' => 91.78, 'lat' => 22.36],
            ],

            'phases' => [
                ['title' => 'Campus Programs', 'count' => '100 campuses', 'desc' => 'AI & freelancing bootcamps, career clinics and marketplace onboarding.'],
                ['title' => 'District Roadshows', 'count' => '12 districts', 'desc' => 'Local talent meets mentors, platforms and service providers.'],
                ['title' => 'Divisional Summits', 'count' => '8 divisions', 'desc' => 'Regional summits with workshops and award nominations.'],
                ['title' => 'Grand Dhaka Summit', 'count' => '1 flagship', 'desc' => 'Keynotes, multi-track sessions, exhibition and the Awards.'],
            ],

            'audiences' => [
                ['id' => 'students', 'image' => '/images/stock/students.jpg', 'label' => 'Students', 'icon' => 'GraduationCap',
                    'headline' => 'Start your digital career with the right skills and mentors.',
                    'points' => ['Hands-on AI and freelancing workshops', 'Marketplace profile clinics', 'ITES/BPO career fair access', 'Campus ambassador opportunities'],
                    'cta' => ['label' => 'Register as Attendee', 'href' => '/register']],
                ['id' => 'freelancers', 'image' => '/images/stock/developer.jpg', 'label' => 'Freelancers', 'icon' => 'Laptop',
                    'headline' => 'Level up, get recognised and grow a global client base.',
                    'points' => ['Advanced sessions on pricing and AI workflows', 'Freelancer Awards nominations', 'Direct access to marketplace leaders', 'BACCO Freelancer Forum membership'],
                    'cta' => ['label' => 'Nominate Yourself', 'href' => '/awards/nominate']],
                ['id' => 'entrepreneurs', 'image' => '/images/stock/high-five.jpg', 'label' => 'Entrepreneurs', 'icon' => 'Rocket',
                    'headline' => 'Turn freelance skills into scalable digital businesses.',
                    'points' => ['Agency-building and export playbooks', 'Investor and partner networking', 'Exhibition visibility', 'Policy and financing dialogues'],
                    'cta' => ['label' => 'Book a Booth', 'href' => '/exhibition/apply']],
                ['id' => 'industry', 'image' => '/images/stock/expo-crowd.jpg', 'label' => 'Industry & BPO', 'icon' => 'Building',
                    'headline' => 'Discover talent and position your brand nationwide.',
                    'points' => ['Recruit from a nationwide talent pipeline', 'Sponsorship and brand activation', 'Exhibition booths at the Grand Summit', 'Thought-leadership speaking slots'],
                    'cta' => ['label' => 'Explore Sponsorship', 'href' => '/sponsorship-opportunity']],
                ['id' => 'government', 'image' => '/images/stock/panel.jpg', 'label' => 'Government & Academia', 'icon' => 'Landmark',
                    'headline' => 'Shape the policies and programs behind the digital workforce.',
                    'points' => ['Policy roundtables', 'Campus partnership programs', 'Insights from the national campaign', 'Collaboration with industry bodies'],
                    'cta' => ['label' => 'Partner with Us', 'href' => '/contact']],
            ],

            'highlights' => [
                ['icon' => 'Mic', 'title' => 'Keynotes & Panels', 'image' => '/images/stock/keynote.jpg', 'desc' => 'Visionary talks on the future of work, AI and the global gig economy.'],
                ['icon' => 'Sparkles', 'title' => 'AI Skills Lab', 'image' => '/images/stock/ai.jpg', 'desc' => 'Hands-on labs on generative AI tools for real client work.'],
                ['icon' => 'Store', 'title' => 'Marketplace Connect', 'image' => '/images/stock/freelancers.jpg', 'desc' => 'Meet platform teams and optimise your marketplace presence.'],
                ['icon' => 'BriefcaseBusiness', 'title' => 'ITES/BPO Career Zone', 'image' => '/images/stock/tech-woman.jpg', 'desc' => 'Recruiters, career counselling and on-the-spot interviews.'],
                ['icon' => 'Trophy', 'title' => 'Freelancer Awards', 'image' => '/images/stock/stage-screen.jpg', 'desc' => 'A national stage recognising outstanding digital professionals.'],
                ['icon' => 'Handshake', 'title' => 'Networking Lounge', 'image' => '/images/stock/networking.jpg', 'desc' => 'Curated meetups between freelancers, founders and industry.'],
            ],

            'speakers' => [
                ['slug' => 'speaker-1', 'role' => 'Keynote', 'org' => 'Global Marketplace', 'topic' => 'Future of Work'],
                ['slug' => 'speaker-2', 'role' => 'Panelist', 'org' => 'AI Research', 'topic' => 'Applied AI'],
                ['slug' => 'speaker-3', 'role' => 'Workshop Lead', 'org' => 'Top-Rated Freelancer', 'topic' => 'Personal Branding'],
                ['slug' => 'speaker-4', 'role' => 'Panelist', 'org' => 'BPO Industry', 'topic' => 'ITES Careers'],
                ['slug' => 'speaker-5', 'role' => 'Keynote', 'org' => 'Public Sector', 'topic' => 'Digital Policy'],
                ['slug' => 'speaker-6', 'role' => 'Mentor', 'org' => 'Startup Founder', 'topic' => 'Entrepreneurship'],
            ],

            'agenda' => [
                'days' => [['id' => 'd1', 'label' => 'Day 1'], ['id' => 'd2', 'label' => 'Day 2']],
                'tracks' => ['All', 'Main Stage', 'AI Lab', 'Marketplace', 'Career Zone'],
                'sessions' => [
                    ['day' => 'd1', 'time' => '09:30', 'track' => 'Main Stage', 'type' => 'Keynote', 'title' => 'Opening Ceremony & Inaugural Keynote', 'room' => 'Hall A'],
                    ['day' => 'd1', 'time' => '10:45', 'track' => 'Main Stage', 'type' => 'Panel', 'title' => 'Bangladesh in the Global Digital Workforce', 'room' => 'Hall A'],
                    ['day' => 'd1', 'time' => '11:00', 'track' => 'AI Lab', 'type' => 'Workshop', 'title' => 'Generative AI Toolkit for Freelancers', 'room' => 'Lab 1'],
                    ['day' => 'd1', 'time' => '12:00', 'track' => 'Marketplace', 'type' => 'Session', 'title' => 'Winning Profiles: Marketplace Optimisation Clinic', 'room' => 'Hall B'],
                    ['day' => 'd1', 'time' => '14:00', 'track' => 'Career Zone', 'type' => 'Workshop', 'title' => 'ITES/BPO Career Pathways & Live Interviews', 'room' => 'Career Hall'],
                    ['day' => 'd2', 'time' => '09:30', 'track' => 'Main Stage', 'type' => 'Keynote', 'title' => 'From Freelancer to Founder', 'room' => 'Hall A'],
                    ['day' => 'd2', 'time' => '11:00', 'track' => 'Marketplace', 'type' => 'Panel', 'title' => 'Payments, Compliance & Cross-Border Earnings', 'room' => 'Hall B'],
                    ['day' => 'd2', 'time' => '11:00', 'track' => 'AI Lab', 'type' => 'Workshop', 'title' => 'Building AI Agents for Small Businesses', 'room' => 'Lab 1'],
                    ['day' => 'd2', 'time' => '14:00', 'track' => 'Career Zone', 'type' => 'Networking', 'title' => 'Women in Freelancing Meetup', 'room' => 'Lounge'],
                    ['day' => 'd2', 'time' => '17:00', 'track' => 'Main Stage', 'type' => 'Awards', 'title' => 'Freelancer Awards Ceremony', 'room' => 'Hall A'],
                ],
            ],

            'award_categories' => [
                ['icon' => 'Crown', 'title' => 'Freelancer of the Year'],
                ['icon' => 'Sprout', 'title' => 'Emerging Freelancer'],
                ['icon' => 'Heart', 'title' => 'Woman Freelancer of the Year'],
                ['icon' => 'Cpu', 'title' => 'AI Innovator'],
                ['icon' => 'Palette', 'title' => 'Creative & Design'],
                ['icon' => 'CodeXml', 'title' => 'Software & Development'],
                ['icon' => 'Megaphone', 'title' => 'Digital Marketing'],
                ['icon' => 'MapPin', 'title' => 'Rural Digital Champion'],
            ],

            'sponsor_tiers' => [
                ['name' => 'Title', 'perks' => ['Naming rights with summit identity', 'Keynote speaking slot', 'Premium exhibition island', 'Nationwide campaign branding']],
                ['name' => 'Platinum', 'perks' => ['Track ownership', 'Large exhibition booth', 'Divisional summit branding', 'Digital & media visibility']],
                ['name' => 'Gold', 'perks' => ['Panel participation', 'Standard booth', 'Logo on stage & collateral']],
                ['name' => 'Silver', 'perks' => ['Logo placement', 'Delegate passes', 'Social media mentions']],
            ],

            'forum_benefits' => [
                ['icon' => 'BadgeCheck', 'title' => 'Verified professional identity'],
                ['icon' => 'GraduationCap', 'title' => 'Year-round learning programs'],
                ['icon' => 'Network', 'title' => 'Mentorship & peer network'],
                ['icon' => 'Scale', 'title' => 'Advocacy & policy voice'],
            ],

            'stories' => [
                ['location' => 'Rangpur', 'field' => 'UI/UX Design', 'quote' => 'Started on a shared campus computer and now serves clients across three continents.'],
                ['location' => 'Khulna', 'field' => 'Data & AI Services', 'quote' => 'AI-assisted workflows helped me move from small gigs to long-term retainers.'],
                ['location' => 'Sylhet', 'field' => 'Digital Marketing', 'quote' => 'Turned a solo freelance career into an agency hiring local talent.'],
                ['location' => 'Rajshahi', 'field' => 'Web Development', 'quote' => 'Marketplace mentoring helped me land my first international contract.'],
                ['location' => 'Barishal', 'field' => 'Content & Video', 'quote' => 'Freelancing let me build a career without leaving my hometown.'],
            ],

            'news' => [
                ['slug' => 'summit-2027-announced', 'image' => '/images/stock/conference-audience.jpg', 'category' => 'Announcement', 'title' => 'Freelancer Summit Bangladesh 2027 national campaign announced', 'excerpt' => 'A nationwide journey across divisions, districts and campuses leading to the Grand Dhaka Summit.'],
                ['slug' => 'awards-nominations', 'image' => '/images/stock/microphone.jpg', 'category' => 'Awards', 'title' => 'Freelancer Awards 2027: categories and guidelines', 'excerpt' => 'Categories, eligibility and how the jury evaluates nominations.'],
                ['slug' => 'campus-programs', 'image' => '/images/stock/seminar.jpg', 'category' => 'Campus', 'title' => 'Campus program partnerships open for universities', 'excerpt' => 'Institutions can apply to host AI and freelancing bootcamps.'],
            ],
        ];
    }
}
