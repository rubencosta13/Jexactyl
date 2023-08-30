import React from 'react';
import PageContentBlock from '../elements/PageContentBlock';
import styled from 'styled-components/macro';
import tw from 'twin.macro';
import { breakpoint } from '@/theme';
import useFlash from '@/plugins/useFlash';

const Container = styled.div`
    ${tw`flex flex-wrap`};

    & > div {
        ${tw`w-full`};

        ${breakpoint('sm')`
      width: calc(50% - 1rem);
    `}

        ${breakpoint('md')`
      ${tw`w-auto flex-1`};
    `}
    }
`;

export default () => {
    // const { clearAndAddHttpError } = useFlashKey('account');
    const { addFlash, clearFlashes, clearAndAddHttpError } = useFlash();

    return (
        <PageContentBlock
            title={'View all available plans for purchase'}
            description={'View / Purchase templated servers'}
            showFlashKey={'store'}
        >
            <Container className={'lg:grid lg:grid-cols-4 my-10 gap-8'}>
                <div>Hello</div>
            </Container>
        </PageContentBlock>
    );
};
