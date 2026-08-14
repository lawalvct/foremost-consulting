export const trainingSlugs = [
    'young-accountants-practical-training',
    'corporate-in-house-training',
    'tax-and-compliance-workshops',
    'accounting-software-training',
    'custom-capacity-building-programmes',
] as const;

export type TrainingSlug = (typeof trainingSlugs)[number];

export type TrainingDetail = {
    slug: TrainingSlug;
    title: string;
    category: string;
    valueProposition: string;
    metaDescription: string;
    deliveryMode: string;
    intendedAudience: string[];
    objectives: string[];
    modules: string[];
};

export const trainingDetails: Record<TrainingSlug, TrainingDetail> = {
    'young-accountants-practical-training': {
        slug: 'young-accountants-practical-training',
        title: "Young Accountants' Practical Training",
        category: 'Professional Development',
        valueProposition:
            'Applied learning that helps emerging accountants connect technical knowledge with confident workplace practice.',
        metaDescription:
            'Practical professional development for young accountants covering records, reconciliations, reporting, controls and workplace application.',
        deliveryMode:
            'On-site or at a designated training centre, subject to the approved session arrangement.',
        intendedAudience: [
            'Young accountants beginning or developing their careers',
            'Accounting graduates seeking stronger practical exposure',
            'Junior finance-team members moving into broader responsibilities',
            'Professionals who need to refresh core workplace processes',
        ],
        objectives: [
            'Connect accounting principles with day-to-day financial work',
            'Build confidence in records, reconciliations and supporting schedules',
            'Improve understanding of controls and professional responsibility',
            'Strengthen the preparation and interpretation of basic reports',
        ],
        modules: [
            'Accounting records and source documentation',
            'Bank, customer and supplier reconciliations',
            'Periodic accounts and supporting schedules',
            'Inventory and fixed-asset records',
            'Internal controls and approval processes',
            'Professional communication and workplace discipline',
        ],
    },
    'corporate-in-house-training': {
        slug: 'corporate-in-house-training',
        title: 'Corporate & In-house Training',
        category: 'Organisational Learning',
        valueProposition:
            'Focused training designed around organisational teams, responsibilities and the practical needs of the workplace.',
        metaDescription:
            'In-house financial, accounting, controls, tax and systems training designed around organisational teams and operating needs.',
        deliveryMode:
            'At the client premises or another agreed venue, subject to the approved programme plan.',
        intendedAudience: [
            'Finance and accounting teams',
            'Operational managers with financial responsibilities',
            'Internal-control and compliance personnel',
            'Cross-functional teams working with financial processes',
        ],
        objectives: [
            'Address identified skills and process gaps within the team',
            'Create a shared understanding of roles, controls and information flows',
            'Improve consistent application of agreed workplace procedures',
            'Support practical learning through organisation-relevant examples',
        ],
        modules: [
            'Financial-process and skills-gap orientation',
            'Roles, responsibilities and approval workflows',
            'Record quality and supporting documentation',
            'Management reporting and decision information',
            'Controls, compliance and professional responsibility',
            'Applied exercises shaped around the agreed training scope',
        ],
    },
    'tax-and-compliance-workshops': {
        slug: 'tax-and-compliance-workshops',
        title: 'Tax & Compliance Workshops',
        category: 'Tax & Compliance',
        valueProposition:
            'Practical workshops that help participants understand obligations, documentation and responsible compliance processes.',
        metaDescription:
            'Practical tax and compliance workshops covering obligations, records, computations, returns and regulatory-response processes.',
        deliveryMode:
            'On-site or at a designated training centre, subject to the approved workshop arrangement.',
        intendedAudience: [
            'Finance and tax personnel',
            'Business owners and managers responsible for compliance',
            'Accounting professionals developing tax-process knowledge',
            'Teams preparing for recurring filings or regulatory correspondence',
        ],
        objectives: [
            'Improve awareness of relevant tax and compliance responsibilities',
            'Strengthen the organisation of records supporting tax positions',
            'Explain practical computation, return and reconciliation processes',
            'Build confidence in responsible regulatory correspondence',
        ],
        modules: [
            'Tax obligations and compliance calendars',
            'Supporting records and documentation',
            'Tax computations and return preparation',
            'Reconciliation of tax positions',
            'Tax review and audit readiness',
            'Responsible correspondence with relevant authorities',
        ],
    },
    'accounting-software-training': {
        slug: 'accounting-software-training',
        title: 'Accounting Software Training',
        category: 'Accounting Technology',
        valueProposition:
            'Hands-on user enablement that connects accounting-system features with consistent processes, controls and reporting.',
        metaDescription:
            'Accounting software training covering navigation, records, workflows, reconciliations, reporting and responsible system use.',
        deliveryMode:
            'On-site or at a designated training centre, aligned with the approved system and user requirements.',
        intendedAudience: [
            'Accounting-system users',
            'Finance teams preparing for a new implementation',
            'Supervisors responsible for approvals and reporting',
            'Growing businesses formalising accounting workflows',
        ],
        objectives: [
            'Build confidence in the agreed accounting-system workflows',
            'Connect system use with accurate records and internal controls',
            'Improve consistent processing, reconciliation and reporting',
            'Help users understand roles, approvals and responsible access',
        ],
        modules: [
            'System orientation and user navigation',
            'Chart of accounts and master records',
            'Transaction processing and supporting documentation',
            'Reconciliations and exception review',
            'User roles and approval workflows',
            'Management and financial reporting',
        ],
    },
    'custom-capacity-building-programmes': {
        slug: 'custom-capacity-building-programmes',
        title: 'Custom Capacity-building Programmes',
        category: 'Custom Programmes',
        valueProposition:
            'Purpose-designed learning shaped around identified skills gaps, organisational priorities and an agreed practical outcome.',
        metaDescription:
            'Custom capacity-building programmes designed around organisational skills gaps, operating needs and agreed learning objectives.',
        deliveryMode:
            'At the client premises or another agreed venue, based on the approved programme design.',
        intendedAudience: [
            'Organisations with a defined team-development priority',
            'Departments experiencing process or knowledge gaps',
            'Cross-functional teams adopting new financial procedures',
            'Institutions requiring a structured, organisation-specific programme',
        ],
        objectives: [
            'Clarify the capability gap and intended learning outcome',
            'Design content around the organisation and participant context',
            'Combine instruction with practical exercises and discussion',
            'Support application through clear post-training actions',
        ],
        modules: [
            'Training-needs and audience assessment',
            'Programme objectives and content design',
            'Organisation-relevant technical topics',
            'Applied exercises and facilitated discussion',
            'Workplace application and action planning',
            'Agreed follow-through or reinforcement support',
        ],
    },
};
