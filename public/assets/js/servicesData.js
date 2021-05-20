"use strict";

const servicesData = [
    {
        "id": 0,
        "title": "I can create SEO friendly content - web-development",
        "name": "Joe B.",
        "imgID": "avatar-man1",
        "role": "Software Engineer & SEO Specialist",
        "category": "Software Enginering | Web development | SEO",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },

    {
        "id": 1,
        "title": "I specialise in programming/coding - HTML, CSS, JavaScript",
        "name": "Liz H.",
        "imgID": "avatar-woman2",
        "role": "Full Stack Developer",
        "category": "Software Enginering | Web development | SEO",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },

    {
        "id": 2,
        "title": "I will write you a great Employee Handbook (Consulting)",
        "name": "John D.",
        "imgID": "avatar-man2",
        "role": "Business Consultant",
        "category": "Consulting",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },

    {
        "id": 3,
        "name": "Mary J.",
        "imgID": "avatar-woman1",
        "title": "I will write you an accurate job description (consulting)",
        "role": "Consultant",
        "category": "Consulting",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },

    {
        "id": 4,
        "name": "Peter P.",
        "imgID": "avatar-man2",
        "title": "I am proficent with HTML, CSS, JavaScript, Python -web-development",
        "role": "Web Developer",
        "category": "Content Writing",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },

    {
        "id": 5,
        "title": "Website development & web design with wordpress",
        "name": "Sam C.",
        "imgID": "avatar-woman1",
        "role": "Web Developer",
        "category": "wordpress | Web development",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },

    {
        "id": 6,
        "title": "I will develop full stack web apps in react, nodejs and angular",
        "name": "Nathan L.",
        "imgID": "avatar-man1",
        "role": "Web Developer",
        "category": "React, Nodejs & Angular | Web development",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },

    {
        "id": 7,
        "title": "I will write SEO optimized content for your blog (content-writing)",
        "name": "Nancy J.",
        "imgID": "avatar-woman1",
        "role": "Bloger",
        "category": "Content Writing",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },

    {
        "id": 8,
        "title": "I will write creative website content using engaging copywriting (content-writing)",
        "name": "Matt J.",
        "imgID": "avatar-man2",
        "role": "Bloger | Copywriter",
        "category": "Content Writing",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },

    {
        "id": 9,
        "title": "I will do videography and video editing",
        "name": "Xain S.",
        "imgID": "avatar-man2",
        "role": "Videographer",
        "category": "Videography | Video Editing",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },

    {
        "id": 10,
        "title": "I will do professional ads videography",
        "name": "Tom H.",
        "imgID": "avatar-man1",
        "role": "Videographer",
        "category": "Videography | Video Editing",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },

    {
        "id": 11,
        "title": "I will produce professional product videography",
        "name": "Maizzie O.",
        "imgID": "avatar-woman1",
        "role": "Videographer",
        "category": "Videography | Video Editing",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },

    {
        "id": 12,
        "title": "I will create high quality wedding videography",
        "name": "Alex E.",
        "imgID": "avatar-woman2",
        "role": "Videographer",
        "category": "Videography | Video Editing",
        "description": " I have over 8 years exp...Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
    },


]
