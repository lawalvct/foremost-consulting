import type { ServiceSlug } from '@/content/serviceDetails';

export const industrySlugs = [
    'financial-services-and-microfinance',
    'government-and-public-sector',
    'education',
    'healthcare',
    'manufacturing',
    'hospitality',
    'oil-and-gas',
    'smes-and-growing-businesses',
] as const;

export type IndustrySlug = (typeof industrySlugs)[number];

export type IndustryDetail = {
    slug: IndustrySlug;
    title: string;
    shortTitle: string;
    valueProposition: string;
    metaDescription: string;
    challenges: string[];
    relevantServices: ServiceSlug[];
    outcomes: string[];
    insightThemes: string[];
};

export const industryDetails: Record<IndustrySlug, IndustryDetail> = {
    'financial-services-and-microfinance': {
        slug: 'financial-services-and-microfinance',
        title: 'Financial Services & Microfinance',
        shortTitle: 'Financial Services',
        valueProposition:
            'Professional support for stronger reporting, controls, compliance processes and management visibility in financial-service organisations.',
        metaDescription:
            'Audit, accounting, tax, controls, systems and advisory support for financial institutions and microfinance organisations.',
        challenges: [
            'Maintaining reliable records across high-volume financial activity.',
            'Strengthening controls, approvals and management oversight.',
            'Preparing timely reports for leadership and relevant stakeholders.',
            'Coordinating tax, audit and regulatory-response processes.',
        ],
        relevantServices: [
            'audit-and-assurance',
            'accounting-and-financial-management',
            'tax-and-regulatory-advisory',
            'accounting-technology-and-systems',
        ],
        outcomes: [
            'Clearer financial and management reporting',
            'More structured control and approval processes',
            'Better-organised audit and compliance documentation',
            'Improved visibility into reconciliations and exceptions',
        ],
        insightThemes: [
            'Internal controls and governance',
            'Management reporting',
            'Tax and regulatory readiness',
        ],
    },
    'government-and-public-sector': {
        slug: 'government-and-public-sector',
        title: 'Government & Public Sector',
        shortTitle: 'Public Sector',
        valueProposition:
            'Carefully scoped financial, audit and capacity-building support for public institutions and government-related organisations.',
        metaDescription:
            'Audit, financial-management, investigation, systems and training support for government and public-sector organisations.',
        challenges: [
            'Demonstrating accountability across programmes and resources.',
            'Maintaining consistent records, reconciliations and supporting schedules.',
            'Reviewing controls around approvals, expenditure and reporting.',
            'Building practical financial and compliance capability across teams.',
        ],
        relevantServices: [
            'audit-and-assurance',
            'accounting-and-financial-management',
            'investigation-and-special-engagements',
            'training-and-capacity-development',
        ],
        outcomes: [
            'More orderly financial records and supporting schedules',
            'Clearer control observations and practical recommendations',
            'Improved reporting discipline and accountability',
            'Stronger team understanding of agreed processes',
        ],
        insightThemes: [
            'Public-sector accountability',
            'Controls and documentation',
            'Financial capacity development',
        ],
    },
    education: {
        slug: 'education',
        title: 'Education',
        shortTitle: 'Education',
        valueProposition:
            'Integrated support for institutions balancing financial stewardship, operational controls and sustainable service delivery.',
        metaDescription:
            'Audit, accounting, tax, systems and training support for schools, tertiary institutions and education organisations.',
        challenges: [
            'Managing income, fees, grants and expenditure across multiple activities.',
            'Reconciling student, supplier, payroll and bank records.',
            'Maintaining asset, inventory and supporting documentation.',
            'Producing timely reports for management and governing bodies.',
        ],
        relevantServices: [
            'audit-and-assurance',
            'accounting-and-financial-management',
            'accounting-technology-and-systems',
            'training-and-capacity-development',
        ],
        outcomes: [
            'Clearer reporting across institutional activities',
            'More reliable reconciliations and supporting records',
            'Improved visibility over assets and financial processes',
            'Stronger finance-team capability and system use',
        ],
        insightThemes: [
            'Education-sector financial controls',
            'Fee and receivables reconciliation',
            'Institutional reporting systems',
        ],
    },
    healthcare: {
        slug: 'healthcare',
        title: 'Healthcare',
        shortTitle: 'Healthcare',
        valueProposition:
            'Financial and control support that helps healthcare organisations improve reporting while staying focused on service delivery.',
        metaDescription:
            'Audit, accounting, tax, inventory, systems and advisory support for healthcare organisations and medical institutions.',
        challenges: [
            'Managing revenue, receivables and multiple payment channels.',
            'Controlling inventories, supplies, equipment and fixed assets.',
            'Reconciling operational records with financial information.',
            'Producing dependable reports for management decisions.',
        ],
        relevantServices: [
            'accounting-and-financial-management',
            'audit-and-assurance',
            'tax-and-regulatory-advisory',
            'accounting-technology-and-systems',
        ],
        outcomes: [
            'Better-organised revenue and receivables information',
            'Improved inventory and asset visibility',
            'More consistent reconciliations and reporting',
            'Clearer financial information for operational decisions',
        ],
        insightThemes: [
            'Healthcare revenue controls',
            'Inventory and asset management',
            'Management reporting for service organisations',
        ],
    },
    manufacturing: {
        slug: 'manufacturing',
        title: 'Manufacturing',
        shortTitle: 'Manufacturing',
        valueProposition:
            'Accounting, controls and advisory support for organisations managing production costs, inventory, assets and growth decisions.',
        metaDescription:
            'Audit, cost accounting, inventory, asset, tax and business-advisory support for manufacturing organisations.',
        challenges: [
            'Understanding production costs, margins and operational performance.',
            'Maintaining dependable inventory and fixed-asset records.',
            'Reconciling purchasing, production, sales and financial information.',
            'Planning cash flow, budgets and investment decisions.',
        ],
        relevantServices: [
            'accounting-and-financial-management',
            'audit-and-assurance',
            'management-and-business-advisory',
            'tax-and-regulatory-advisory',
        ],
        outcomes: [
            'Clearer cost and margin information',
            'Improved inventory and fixed-asset records',
            'More structured budgets and cash-flow projections',
            'Better-aligned operational and financial reporting',
        ],
        insightThemes: [
            'Cost accounting and margins',
            'Inventory-control practices',
            'Capital and cash-flow planning',
        ],
    },
    hospitality: {
        slug: 'hospitality',
        title: 'Hospitality',
        shortTitle: 'Hospitality',
        valueProposition:
            'Practical financial-management support for hospitality organisations balancing daily operations, controls and guest service.',
        metaDescription:
            'Accounting, audit, tax, inventory, systems and advisory support for hospitality and accommodation organisations.',
        challenges: [
            'Reconciling daily sales, payment channels and operating records.',
            'Monitoring food, beverage, consumable and other inventories.',
            'Understanding departmental costs, margins and cash flow.',
            'Maintaining consistent controls across busy operating environments.',
        ],
        relevantServices: [
            'accounting-and-financial-management',
            'audit-and-assurance',
            'accounting-technology-and-systems',
            'management-and-business-advisory',
        ],
        outcomes: [
            'More reliable daily and periodic reconciliations',
            'Improved inventory and cost visibility',
            'Clearer departmental and management reporting',
            'More consistent financial-control routines',
        ],
        insightThemes: [
            'Daily revenue reconciliation',
            'Hospitality inventory controls',
            'Departmental performance reporting',
        ],
    },
    'oil-and-gas': {
        slug: 'oil-and-gas',
        title: 'Oil & Gas',
        shortTitle: 'Oil & Gas',
        valueProposition:
            'Purpose-defined financial, audit and advisory support for organisations operating across complex projects, contracts and transactions.',
        metaDescription:
            'Audit, accounting, tax, due diligence and business-advisory support for oil and gas sector organisations.',
        challenges: [
            'Organising project, contract and transaction records.',
            'Tracking costs, assets, cash flow and performance across activities.',
            'Preparing dependable financial and management reports.',
            'Supporting defined reviews, due diligence or investment decisions.',
        ],
        relevantServices: [
            'audit-and-assurance',
            'accounting-and-financial-management',
            'tax-and-regulatory-advisory',
            'investigation-and-special-engagements',
        ],
        outcomes: [
            'More structured project and transaction documentation',
            'Clearer cost, asset and cash-flow visibility',
            'Improved readiness for agreed reviews',
            'Better-supported management and investment decisions',
        ],
        insightThemes: [
            'Project accounting and controls',
            'Transaction documentation',
            'Due diligence readiness',
        ],
    },
    'smes-and-growing-businesses': {
        slug: 'smes-and-growing-businesses',
        title: 'SMEs & Growing Businesses',
        shortTitle: 'SMEs & Growth',
        valueProposition:
            'Scalable financial, compliance and systems support for businesses building stronger foundations for sustainable growth.',
        metaDescription:
            'Accounting, tax, corporate affairs, systems and business-advisory support for SMEs and growing businesses.',
        challenges: [
            'Moving from informal records to dependable financial information.',
            'Managing cash flow, tax obligations and corporate filings.',
            'Introducing practical controls without unnecessary complexity.',
            'Preparing plans, projections and systems for the next stage of growth.',
        ],
        relevantServices: [
            'accounting-and-financial-management',
            'tax-and-regulatory-advisory',
            'corporate-affairs-services',
            'management-and-business-advisory',
        ],
        outcomes: [
            'More reliable books and management information',
            'Better-organised compliance and corporate records',
            'Clearer cash-flow plans and business priorities',
            'Financial processes that can grow with the organisation',
        ],
        insightThemes: [
            'Building reliable financial records',
            'Cash-flow and growth planning',
            'Practical controls for growing teams',
        ],
    },
};
