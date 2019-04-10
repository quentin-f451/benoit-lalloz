panel.plugin('quentincrzt/feeds', {
	'fields': {
		'feeds': {
			props: {
				page: Array
			},
			template: `
				<k-collection layout="list" :items="page" />
			`
		}
	}
});