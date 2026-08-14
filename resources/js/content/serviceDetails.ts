export const serviceSlugs = [
    'audit-and-assurance',
    'accounting-and-financial-management',
    'tax-and-regulatory-advisory',
    'management-and-business-advisory',
    'corporate-affairs-services',
    'investigation-and-special-engagements',
    'accounting-technology-and-systems',
    'training-and-capacity-development',
] as const;

export type ServiceSlug = (typeof serviceSlugs)[number];

export type ServiceDetail = {
    slug: ServiceSlug;
    title: string;
    valueProposition: string;
    metaDescription: string;
    problems: string[];
    components: string[];
    audiences: string[];
    sectors: string[];
};

export const engagementApproach = [
    {
        title: 'Understand',
        description:
            'Clarify the organisation, operating context, priorities and available information.',
    },
    {
        title: 'Scope',
        description:
            'Agree engagement boundaries, responsibilities, timing and intended outputs.',
    },
    {
        title: 'Deliver',
        description:
            'Perform agreed work with clear communication, professional judgement and confidentiality.',
    },
    {
        title: 'Support',
        description:
            'Explain findings, practical next steps and agreed follow-through support.',
    },
] as const;

export const serviceDetails: Record<ServiceSlug, ServiceDetail> = {
    'audit-and-assurance': {
        slug: 'audit-and-assurance',
        title: 'Audit & Assurance',
        valueProposition:
            'Independent, carefully scoped reviews that strengthen confidence in financial reporting, controls and organisational processes.',
        metaDescription:
            'Audit and assurance support for financial reporting, internal controls, operations and compliance from Foremost Consulting Associates.',
        problems: [
            'The need for independent confidence in financial statements and supporting records.',
            'Control weaknesses and process gaps requiring structured review.',
            'Limited visibility into operational, compliance and reporting risks.',
        ],
        components: [
            'Statutory audit',
            'Financial statement audit',
            'Management audit',
            'Internal-control review',
            'Operational and compliance review',
            'Audit recommendations and management letters',
        ],
        audiences: [
            'Businesses and institutions requiring an independent review',
            'Boards and management teams strengthening governance and controls',
            'Organisations preparing reliable reports for stakeholders',
        ],
        sectors: [
            'Financial institutions and microfinance',
            'Government and public sector',
            'Education and healthcare',
            'Manufacturing and hospitality',
        ],
    },
    'accounting-and-financial-management': {
        slug: 'accounting-and-financial-management',
        title: 'Accounting & Financial Management',
        valueProposition:
            'Practical accounting support that improves record quality, reporting visibility and day-to-day financial control.',
        metaDescription:
            'Accounting and financial-management support covering records, reporting, reconciliations, inventory, assets and system design.',
        problems: [
            'Incomplete accounting records or accumulated reporting backlogs.',
            'Delayed management accounts and limited financial visibility.',
            'Unreconciled balances, inventory records or fixed-asset information.',
        ],
        components: [
            'Bookkeeping and periodic accounting',
            'Clearing accounting backlogs',
            'Financial statement preparation',
            'Management accounts',
            'Bank reconciliation',
            'Customer and supplier reconciliation',
            'Physical inventory and inventory-control support',
            'Fixed-asset register and verification',
            'Accounting and cost-accounting system design',
        ],
        audiences: [
            'SMEs and growing businesses improving financial records',
            'Institutions addressing reporting backlogs',
            'Finance teams needing reconciliations and management information',
        ],
        sectors: [
            'SMEs and growing businesses',
            'Education and healthcare',
            'Manufacturing',
            'Hospitality',
        ],
    },
    'tax-and-regulatory-advisory': {
        slug: 'tax-and-regulatory-advisory',
        title: 'Tax & Regulatory Advisory',
        valueProposition:
            'Clear, responsible support for understanding tax positions, meeting obligations and responding to regulatory processes.',
        metaDescription:
            'Responsible tax planning, compliance, review, reconciliation and regulatory-process support for organisations in Nigeria.',
        problems: [
            'Uncertainty about tax obligations, computations and filing requirements.',
            'Tax positions that require reconciliation and supporting records.',
            'The need for structured support during audits, investigations or correspondence.',
        ],
        components: [
            'Tax planning and advisory',
            'Tax computations and returns',
            'Tax-clearance support',
            'Tax compliance review',
            'Tax audit and investigation support',
            'Reconciliation of tax positions',
            'Representation and correspondence with relevant authorities',
        ],
        audiences: [
            'Organisations managing recurring tax obligations',
            'Businesses responding to tax reviews or correspondence',
            'Management teams requiring planning and documentation support',
        ],
        sectors: [
            'Financial institutions and microfinance',
            'Government-related organisations',
            'Manufacturing and hospitality',
            'SMEs and growing businesses',
        ],
    },
    'management-and-business-advisory': {
        slug: 'management-and-business-advisory',
        title: 'Management & Business Advisory',
        valueProposition:
            'Structured analysis and practical planning support for investment, funding, performance and organisational decisions.',
        metaDescription:
            'Business advisory for appraisals, feasibility, planning, projections, budgeting, funding documentation and restructuring support.',
        problems: [
            'Investment or expansion decisions that require structured analysis.',
            'Funding discussions that require credible plans and projections.',
            'Performance or organisational issues requiring independent review.',
        ],
        components: [
            'Project and investment appraisal',
            'Feasibility studies',
            'Business plans',
            'Cash-flow projections',
            'Funding documentation for banks and lenders',
            'Budgeting',
            'Strategic planning',
            'Management structure review',
            'Business turnaround and restructuring support',
        ],
        audiences: [
            'Owners and management teams evaluating growth decisions',
            'Businesses preparing for funding discussions',
            'Institutions reviewing strategy, structure or performance',
        ],
        sectors: [
            'SMEs and growing businesses',
            'Manufacturing',
            'Hospitality',
            'Education and healthcare',
        ],
    },
    'corporate-affairs-services': {
        slug: 'corporate-affairs-services',
        title: 'Corporate Affairs Services',
        valueProposition:
            'Carefully managed incorporation and post-incorporation support that helps organisations maintain orderly corporate records and filings.',
        metaDescription:
            'Corporate affairs support for incorporation, annual returns and approved post-incorporation filings in Nigeria.',
        problems: [
            'A new organisation requires an orderly incorporation process.',
            'Annual returns or post-incorporation updates are outstanding.',
            'Corporate records need to reflect approved organisational changes.',
        ],
        components: [
            'Incorporation',
            'Annual returns',
            'Director changes',
            'Registered-address changes',
            'Share-capital changes',
            'Other post-incorporation filings',
        ],
        audiences: [
            'Entrepreneurs and promoters forming a new organisation',
            'Companies managing statutory updates',
            'Organisations coordinating multiple corporate filings',
        ],
        sectors: [
            'SMEs and growing businesses',
            'Manufacturing and hospitality',
            'Education and healthcare',
            'Professional and institutional organisations',
        ],
    },
    'investigation-and-special-engagements': {
        slug: 'investigation-and-special-engagements',
        title: 'Investigation & Special Engagements',
        valueProposition:
            'Confidential, purpose-defined reviews that help decision-makers examine specific concerns, transactions, records or governance questions.',
        metaDescription:
            'Confidential investigation, verification, due diligence, governance review and special-purpose engagement support.',
        problems: [
            'Records, transactions or specific concerns require structured examination.',
            'A proposed transaction requires financial or operational due diligence.',
            'Governance, verification or project questions need an independent review.',
        ],
        components: [
            'Fraud-related review',
            'Verification',
            'Due diligence',
            'Merger and acquisition support',
            'Corporate-governance review',
            'Project evaluation',
            'Special-purpose investigation',
        ],
        audiences: [
            'Boards and management teams examining defined concerns',
            'Organisations evaluating transactions or projects',
            'Institutions requiring verification or governance review',
        ],
        sectors: [
            'Financial institutions and microfinance',
            'Government and public sector',
            'Manufacturing',
            'Education and healthcare',
        ],
    },
    'accounting-technology-and-systems': {
        slug: 'accounting-technology-and-systems',
        title: 'Accounting Technology & Systems',
        valueProposition:
            'Process-led accounting-system implementation that connects software configuration with controls, reporting and user adoption.',
        metaDescription:
            'Accounting-system process review, selection, implementation, migration, configuration, training and post-launch support.',
        problems: [
            'Fragmented or manual accounting processes limit visibility and control.',
            'A system implementation requires careful configuration and migration.',
            'Users, roles, approvals and reports are not aligned with operating needs.',
        ],
        components: [
            'Accounting-process review',
            'Software selection',
            'Software implementation',
            'Chart-of-accounts configuration',
            'Data migration and opening balances',
            'Inventory and payroll configuration',
            'User roles and approval workflows',
            'Management reporting setup',
            'Staff training and post-launch support',
        ],
        audiences: [
            'Organisations adopting or replacing an accounting system',
            'Finance teams improving workflows and reporting',
            'Growing businesses formalising financial processes',
        ],
        sectors: [
            'SMEs and growing businesses',
            'Manufacturing and hospitality',
            'Education and healthcare',
            'Financial institutions and microfinance',
        ],
    },
    'training-and-capacity-development': {
        slug: 'training-and-capacity-development',
        title: 'Training & Capacity Development',
        valueProposition:
            'Practical learning programmes designed around professional development, organisational needs and confident workplace application.',
        metaDescription:
            'Professional and corporate training for accountants, teams, tax and audit participants, and accounting-system users.',
        problems: [
            'Skills gaps are affecting confident workplace application.',
            'Teams need practical learning aligned with their responsibilities.',
            'An organisation requires a programme shaped around specific needs.',
        ],
        components: [
            'In-house corporate training',
            'General professional programmes',
            'Custom training packages',
            'Young accountant development',
            'Tax and audit workshops',
            'Accounting software training',
            'On-site or designated-centre delivery',
        ],
        audiences: [
            'Young accountants',
            'Corporate and in-house teams',
            'Tax, compliance and audit workshop participants',
            'Accounting-software users',
        ],
        sectors: [
            'Businesses and professional firms',
            'Government and public sector',
            'Education and healthcare',
            'Financial institutions and microfinance',
        ],
    },
};
