import {
    BadgeCheck,
    BookOpenCheck,
    BriefcaseBusiness,
    Building2,
    Calculator,
    Factory,
    FileCheck2,
    Fuel,
    GraduationCap,
    HeartPulse,
    Hotel,
    Landmark,
    Layers3,
    MonitorCog,
    SearchCheck,
    ShieldCheck,
    Target,
} from '@lucide/vue';
import type { Component } from 'vue';

export type HomepageVariant = 'v1' | 'v2';

export type CoreService = {
    id: string;
    title: string;
    description: string;
    href: string;
    icon: Component;
};

export type WhyForemostItem = {
    title: string;
    description: string;
    icon: Component;
};

export type SectorExperienceItem = {
    title: string;
    icon: Component;
};

export type TrainingProgramme = {
    title: string;
    description: string;
    icon: Component;
};

export type PublishedInsight = {
    title: string;
    category: string;
    publishedAt: {
        iso: string;
        label: string;
    };
    readingTime: string;
    href: string;
    image: {
        src: string;
        alt: string;
        width: number;
        height: number;
    };
};

export const coreServices: CoreService[] = [
    {
        id: 'service-audit-assurance',
        title: 'Audit & Assurance',
        description:
            'Independent reviews that strengthen confidence, controls and reporting.',
        href: '/services/audit-and-assurance',
        icon: ShieldCheck,
    },
    {
        id: 'service-accounting-financial-management',
        title: 'Accounting & Financial Management',
        description:
            'Practical support for books, management accounts and financial statements.',
        href: '/services/accounting-and-financial-management',
        icon: Calculator,
    },
    {
        id: 'service-tax-regulatory-advisory',
        title: 'Tax & Regulatory Advisory',
        description:
            'Clear compliance, planning and support for regulatory obligations.',
        href: '/services/tax-and-regulatory-advisory',
        icon: FileCheck2,
    },
    {
        id: 'service-management-business-advisory',
        title: 'Management & Business Advisory',
        description:
            'Business planning, budgeting, appraisal and strategic advisory.',
        href: '/services/management-and-business-advisory',
        icon: BriefcaseBusiness,
    },
    {
        id: 'service-corporate-affairs',
        title: 'Corporate Affairs Services',
        description:
            'Incorporation and carefully managed post-incorporation filings.',
        href: '/services/corporate-affairs-services',
        icon: Building2,
    },
    {
        id: 'service-investigation-special-engagements',
        title: 'Investigation & Special Engagements',
        description:
            'Confidential due diligence, verification and special-purpose reviews.',
        href: '/services/investigation-and-special-engagements',
        icon: SearchCheck,
    },
    {
        id: 'service-accounting-technology-systems',
        title: 'Accounting Technology & Systems',
        description:
            'Process assessment, implementation, migration and user support.',
        href: '/services/accounting-technology-and-systems',
        icon: MonitorCog,
    },
    {
        id: 'service-training-capacity-development',
        title: 'Training & Capacity Development',
        description:
            'Practical programmes for professionals and organisational teams.',
        href: '/services/training-and-capacity-development',
        icon: GraduationCap,
    },
];

export const whyForemostItems: WhyForemostItem[] = [
    {
        title: 'Professional expertise',
        description:
            'Careful analysis and professional judgement applied to complex financial and business matters.',
        icon: BadgeCheck,
    },
    {
        title: 'Cross-sector experience',
        description:
            'Context-aware support shaped around the realities of different organisations and industries.',
        icon: Building2,
    },
    {
        title: 'Integrated advisory capabilities',
        description:
            'Audit, accounting, tax, systems and advisory thinking brought together around one objective.',
        icon: Layers3,
    },
    {
        title: 'Technology-supported service',
        description:
            'Practical use of accounting systems and modern tools to improve accuracy, visibility and control.',
        icon: MonitorCog,
    },
    {
        title: 'Integrity and confidentiality',
        description:
            'Assignments handled with discretion, clear communication and respect for professional standards.',
        icon: ShieldCheck,
    },
];

export const sectorExperienceItems: SectorExperienceItem[] = [
    {
        title: 'Financial institutions and microfinance',
        icon: Building2,
    },
    {
        title: 'Government and public sector',
        icon: Landmark,
    },
    {
        title: 'Education',
        icon: GraduationCap,
    },
    {
        title: 'Healthcare',
        icon: HeartPulse,
    },
    {
        title: 'Manufacturing',
        icon: Factory,
    },
    {
        title: 'Hospitality',
        icon: Hotel,
    },
    {
        title: 'Oil and gas',
        icon: Fuel,
    },
    {
        title: 'SMEs and growing businesses',
        icon: BriefcaseBusiness,
    },
];

export const accountingTechnologySteps = [
    'Accounting-process assessment',
    'Software-selection advisory',
    'Chart-of-accounts configuration',
    'Data and opening-balance migration',
    'Inventory/payroll setup',
    'User training',
    'Post-implementation support',
] as const;

export const trainingProgrammes: TrainingProgramme[] = [
    {
        title: "Young accountants' practical training",
        description:
            'Applied learning that connects accounting principles with workplace practice.',
        icon: BookOpenCheck,
    },
    {
        title: 'Corporate/in-house training',
        description:
            'Focused sessions designed around organisational teams and operating needs.',
        icon: Building2,
    },
    {
        title: 'Tax and compliance workshops',
        description:
            'Practical workshops that strengthen awareness of obligations and processes.',
        icon: FileCheck2,
    },
    {
        title: 'Accounting software training',
        description:
            'Hands-on user enablement for confident, consistent use of accounting systems.',
        icon: MonitorCog,
    },
    {
        title: 'Custom capacity-building programmes',
        description:
            'Programmes shaped around identified skills gaps and organisational priorities.',
        icon: Target,
    },
];

export const publishedInsights: PublishedInsight[] = [];

export const homepageTrustItems = [
    'Established 2006',
    'Chartered Professionals',
    'Multi-sector Experience',
] as const;
