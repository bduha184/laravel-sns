<template>
    <div>
        <input type="hidden" name="tags" :value="tagsJson" />
        <vue3-tags-input
            :tags="tags"
            placeholder="タグを５個まで入力できます"
            @on-tags-changed="(newTags) => (tags = newTags)"
        />
    </div>
</template>

<script>
import { defineComponent } from "vue";
import Vue3TagsInput from "vue3-tags-input";

export default defineComponent({
    components: {
        Vue3TagsInput,
    },
    props: {
        initialTags: {
            type: Array,
            default: [],
        },
    },
    data() {
        return {
            tags: this.initialTags,
        };
    },
    computed: {
        tagsJson() {
            return JSON.stringify(this.tags);
        },
    },
});
</script>
<style lang="css" scoped></style>
<style lang="css"></style>
